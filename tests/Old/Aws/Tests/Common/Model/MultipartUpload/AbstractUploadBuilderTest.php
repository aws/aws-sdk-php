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

use Aws\Common\Model\MultipartUpload\AbstractUploadBuilder;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\Common\Model\MultipartUpload\AbstractUploadBuilder
 */
class AbstractUploadBuilderTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected $className;
    protected $mockBuilder;

    public function setUp()
    {
        $this->className = 'Aws\Common\Model\MultipartUpload\AbstractUploadBuilder';
        $this->mockBuilder = $this->getMockForAbstractClass($this->className);
    }

    public function testHasChainableMethodToInstantiate()
    {
        $uploadBuilder = $this->mockBuilder;
        $this->assertInstanceOf($this->className, $uploadBuilder::newInstance());
    }

    public function testCanUploadFromFilename()
    {
        $b = $this->mockBuilder->setSource(__FILE__);
        $this->assertEquals(__FILE__, $this->readAttribute($b, 'source')->getUri());
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage File does not exist
     */
    public function testEnsuresFilesExistsWhenSettingSource()
    {
        $this->mockBuilder->setSource('/path/to/missing/file/yall');
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage Empty body provided to upload builder
     */
    public function testEnsuresFileIsNotEmptyWhenSettingSource()
    {
        $this->mockBuilder->setSource(EntityBody::factory(''));
    }

    public function testHasChainableSetterMethods()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $body = EntityBody::factory('foo');
        $b = $this->mockBuilder
            ->resumeFrom('foo')
            ->setClient($client)
            ->setSource($body)
            ->setHeaders(array(
                'Foo' => 'Bar'
            ));

        $this->assertEquals('foo', $this->readAttribute($b, 'state'));
        $this->assertSame($client, $this->readAttribute($b, 'client'));
        $this->assertSame($body, $this->readAttribute($b, 'source'));
    }
}
