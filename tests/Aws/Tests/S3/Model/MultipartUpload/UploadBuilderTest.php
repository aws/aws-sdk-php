<?php

namespace Aws\Tests\S3\Model;

use Aws\S3\Model\Acl;
use Aws\S3\Model\Grantee;
use Aws\S3\Model\Grant;
use Aws\S3\Enum\Permission;
use Aws\S3\Model\MultipartUpload\UploadBuilder;
use Aws\S3\Model\MultipartUpload\TransferState;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\S3\Model\MultipartUpload\UploadBuilder
 */
class UploadBuilderTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasChainableMethodToInstantiate()
    {
        $this->assertInstanceOf('Aws\S3\Model\MultipartUpload\UploadBuilder', UploadBuilder::newInstance());
    }

    public function testCanUploadFromFilename()
    {
        $b = UploadBuilder::newInstance()
            ->setSource(__FILE__);
        $this->assertEquals(__FILE__, $this->readAttribute($b, 'source')->getUri());
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testEnsuresFilesExistsWhenSettingSource()
    {
        UploadBuilder::newInstance()->setSource('/path/to/missing/file/yall');
    }

    public function testHasChainableSetterMethods()
    {
        $acl = new Acl(new Grantee('123'));
        $client =  $this->getServiceBuilder()->get('s3');
        $body = EntityBody::factory();

        $b = UploadBuilder::newInstance();
        $b->setBucket('foo')
            ->setKey('baz')
            ->resumeFrom('bar')
            ->setConcurrency(1)
            ->setClient($client)
            ->setMd5('abc')
            ->calculateMd5(false)
            ->calculatePartMd5(true)
            ->setMinPartSize(10000)
            ->setSource($body)
            ->setHeaders(array(
                'Foo' => 'Bar'
            ))
            ->setAcl($acl);

        $this->assertEquals('foo', $this->readAttribute($b, 'bucket'));
        $this->assertEquals('baz', $this->readAttribute($b, 'key'));
        $this->assertEquals('bar', $this->readAttribute($b, 'state'));
        $this->assertEquals('abc', $this->readAttribute($b, 'md5'));
        $this->assertEquals(1, $this->readAttribute($b, 'concurrency'));
        $this->assertTrue($this->readAttribute($b, 'calculatePartMd5'));
        $this->assertSame($client, $this->readAttribute($b, 'client'));
        $this->assertSame($acl, $this->readAttribute($b, 'acl'));
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage You must specify a bucket, key, client, and source
     */
    public function testValidatesThatRequiredFieldsAreSet()
    {
        UploadBuilder::newInstance()->build();
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage You cannot resume a transfer using a non-seekable stream
     */
    public function testValidatesThatNonSeekableStreamsCannotBeResumed()
    {
        $source = $this->getMockBuilder('Guzzle\Http\EntityBody')
            ->setMethods(array('isSeekable'))
            ->disableOriginalConstructor()
            ->getMock();

        $source->expects($this->any())
            ->method('isSeekable')
            ->will($this->returnValue(false));

        UploadBuilder::newInstance()
            ->setSource($source)
            ->resumeFrom('abc')
            ->setBucket('foo')
            ->setKey('baz')
            ->setClient($this->getServiceBuilder()->get('s3'))
            ->build();
    }

    public function testAllowsForExplicitStateObject()
    {
        $state = new TransferState('foo', 'baz', 'bar');
        $uploader = UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('baz')
            ->resumeFrom($state)
            ->setClient($this->getServiceBuilder()->get('s3'))
            ->setSource(EntityBody::factory())
            ->build();
        $this->assertSame($state, $uploader->getState());
    }

    public function testCanResumeStateByLoadingFromS3()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array('s3/list_parts_page_2'));
        $uploader = UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('baz')
            ->resumeFrom('abc')
            ->setClient($client)
            ->setSource(EntityBody::factory())
            ->build();
        $this->assertEquals(1, count($mock->getReceivedRequests()));
        $this->assertEquals(2, count($uploader->getState()));
    }

    public function testCanCreateNewStateByInitiatingMultipartUpload()
    {
        $acl = new Acl(new Grantee('123'));
        $acl->addGrant(new Grant(new Grantee('123'), Permission::READ));
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array('s3/initiate_multipart_upload'));
        $uploader = UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('baz')
            ->setClient($client)
            ->setSource(EntityBody::factory())
            ->setHeaders(array('Foo' => 'Baz'))
            ->setAcl($acl)
            ->build();
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('/baz?uploads', $requests[0]->getResource());
        $this->assertEquals('Baz', (string) $requests[0]->getHeader('Foo'));
        $this->assertTrue($requests[0]->hasHeader('x-amz-grant-read'));
    }

    public function testCanApplyFullMd5OfEntireDataSource()
    {
        $body = $this->getMockBuilder('Guzzle\Http\EntityBody')
            ->setConstructorArgs(array(fopen(__FILE__, 'r')))
            ->setMethods(array('getContentMd5'))
            ->getMock();

        $body->expects($this->once())
            ->method('getContentMd5')
            ->will($this->returnValue('abc'));

        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array('s3/initiate_multipart_upload'));
        $uploader = UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('baz')
            ->calculateMd5(true)
            ->setClient($client)
            ->setSource($body)
            ->build();
        $requests = $mock->getReceivedRequests();
        $this->assertEquals('abc', (string) $requests[0]->getHeader('x-amz-meta-x-amz-content-md5'));
    }

    public function testBuildsDifferentUploaderBasedOnConcurrency()
    {
        $state = new TransferState('foo', 'baz', 'bar');
        $b = UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('baz')
            ->setClient($this->getServiceBuilder()->get('s3'))
            ->resumeFrom($state)
            ->setSource(EntityBody::factory(fopen(__FILE__, 'r')));

        $this->assertInstanceOf('Aws\S3\Model\MultipartUpload\SerialTransfer', $b->build());
        $b->setConcurrency(2);
        $this->assertInstanceOf('Aws\S3\Model\MultipartUpload\ParallelTransfer', $b->build());
    }
}
