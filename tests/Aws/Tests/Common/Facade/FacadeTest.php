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

namespace Aws\Tests\Common\Facade;

use Aws\Common\Aws;
use Aws\Common\Facade\Facade;

/**
 * @covers Aws\Common\Facade\Facade
 */
class FacadeTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testCanMountAndUseFacades()
    {
        Facade::mountFacades($this->getServiceBuilder());
        $this->assertTrue(class_exists('S3'));
        $this->assertInstanceOf('Aws\S3\Command\S3Command', \S3::getCommand('ListBuckets'));
    }

    public function testCanMountAndUseFacadesToArbitraryNamespaces()
    {
        Facade::mountFacades($this->getServiceBuilder(), 'Foo');
        $this->assertTrue(class_exists('Foo\\S3'));
        $this->assertInstanceOf('Aws\S3\Command\S3Command', \Foo\S3::getCommand('ListBuckets'));
    }

    public function testCanAccessMockedClientFromFacade()
    {
        $aws = clone $this->getServiceBuilder();
        $aws->enableFacades('Foo\Bar');

        $mockS3Client = $this->getMockBuilder('Aws\S3\S3Client')
            ->disableOriginalConstructor()
            ->getMock();
        $aws->set('s3', $mockS3Client);

        $retrievedS3Client = \Foo\Bar\S3::getClient();
        $this->assertSame($mockS3Client, $retrievedS3Client);
    }
}
