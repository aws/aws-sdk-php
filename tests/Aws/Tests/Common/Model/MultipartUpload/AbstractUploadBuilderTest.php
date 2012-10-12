<?php

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
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testEnsuresFilesExistsWhenSettingSource()
    {
        $this->mockBuilder->setSource('/path/to/missing/file/yall');
    }

    public function testHasChainableSetterMethods()
    {
        $client =  $this->getServiceBuilder()->get('s3');
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
