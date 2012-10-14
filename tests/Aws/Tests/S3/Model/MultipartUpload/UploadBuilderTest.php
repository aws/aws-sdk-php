<?php

namespace Aws\Tests\S3\Model\MultipartUpload;

use Aws\S3\Enum\Permission;
use Aws\S3\Model\Acp;
use Aws\S3\Model\Grantee;
use Aws\S3\Model\Grant;
use Aws\S3\Model\MultipartUpload\AbstractTransfer;
use Aws\S3\Model\MultipartUpload\TransferState;
use Aws\S3\Model\MultipartUpload\UploadBuilder;
use Aws\S3\Model\MultipartUpload\UploadId;
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

    public function testHasChainableSetterMethods()
   {
       $acp = new Acp(new Grantee('123'));
       $b = UploadBuilder::newInstance();
       $b->setBucket('foo')
           ->setKey('bar')
           ->setConcurrency(1)
           ->setMd5('abc')
           ->calculateMd5(false)
           ->calculatePartMd5(true)
           ->setMinPartSize(10000)
           ->setAcp($acp);

       $this->assertEquals('foo', $this->readAttribute($b, 'bucket'));
       $this->assertEquals('bar', $this->readAttribute($b, 'key'));
       $this->assertEquals(1, $this->readAttribute($b, 'concurrency'));
       $this->assertEquals('abc', $this->readAttribute($b, 'md5'));
       $this->assertTrue($this->readAttribute($b, 'calculatePartMd5'));
       $this->assertFalse($this->readAttribute($b, 'calculateEntireMd5'));
       $this->assertEquals(AbstractTransfer::MIN_PART_SIZE, $this->readAttribute($b, 'minPartSize'));
       $this->assertSame($acp, $this->readAttribute($b, 'acp'));
   }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage You must specify a bucket, key, client, and source.
     */
    public function testValidatesThatRequiredFieldsAreSet()
    {
        UploadBuilder::newInstance()->build();
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage You cannot resume a transfer using a non-seekable source.
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
            ->setBucket('foo')
            ->setKey('bar')
            ->setSource($source)
            ->resumeFrom('abc')
            ->setClient($this->getServiceBuilder()->get('s3'))
            ->build();
    }

    public function testAllowsForExplicitStateObject()
    {
        $state = new TransferState(UploadId::fromParams(array(
            'Bucket'   => 'foo',
            'Key'      => 'bar',
            'UploadId' => 'baz'
        )));

        $uploader = UploadBuilder::newInstance()
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
        $transfer = UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('bar')
            ->resumeFrom('abc')
            ->setClient($client)
            ->setSource(EntityBody::factory())
            ->build();
        $this->assertEquals(1, count($mock->getReceivedRequests()));
        $this->assertEquals(2, count($transfer->getState()));
    }

    public function testCanCreateNewStateByInitiatingMultipartUpload()
    {
//        $client = $this->getServiceBuilder()->get('s3');
//        $mock = $this->setMockResponse($client, array('s3/initiate_multipart_upload'));
//        $transfer = UploadBuilder::newInstance()
//            ->setVaultName('foo')
//            ->setClient($client)
//            ->setSource(EntityBody::factory('foo'))
//            ->build();
//        $requests = $mock->getReceivedRequests();
//        $this->assertEquals(1, count($requests));
//        $this->assertInstanceOf('Aws\S3\Model\MultipartUpload\TransferState', $transfer->getState());


        $acl = new Acp(new Grantee('123'));
        $acl->addGrant(new Grant(new Grantee('123'), Permission::READ));
        $client = $this->getServiceBuilder()->get('s3');
        $mock = $this->setMockResponse($client, array('s3/initiate_multipart_upload'));
        $transfer = UploadBuilder::newInstance()
            ->setBucket('foo')
            ->setKey('bar')
            ->setClient($client)
            ->setSource(EntityBody::factory())
            ->setHeaders(array('Foo' => 'Bar'))
            ->setAcp($acl)
            ->calculateMd5(true)
            ->build();
        $requests = $mock->getReceivedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('/bar?uploads', $requests[0]->getResource());
        $this->assertEquals('Bar', (string) $requests[0]->getHeader('Foo'));
        $this->assertTrue($requests[0]->hasHeader('x-amz-grant-read'));
    }

    public function testBuildsDifferentUploaderBasedOnConcurrency()
    {
        $state = new TransferState(UploadId::fromParams(array(
            'Bucket'   => 'foo',
            'Key'      => 'bar',
            'UploadId' => 'baz'
        )));

        $b = UploadBuilder::newInstance()
            ->setClient($this->getServiceBuilder()->get('s3'))
            ->setSource(EntityBody::factory(fopen(__FILE__, 'r')))
            ->resumeFrom($state);

        $this->assertInstanceOf('Aws\S3\Model\MultipartUpload\SerialTransfer', $b->build());
        $b->setConcurrency(2);
        $this->assertInstanceOf('Aws\S3\Model\MultipartUpload\ParallelTransfer', $b->build());
    }
}
