<?php
namespace Aws\Test\S3\Multipart;

use Aws\Common\Multipart\UploadState;
use Aws\S3\Multipart\UploadBuilder;
use Aws\S3\Multipart\Uploader;
use Aws\Result;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\S3\Multipart\UploadBuilder
 */
class UploadBuilderTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCanCreateBuilder()
    {
        $uploader = (new UploadBuilder)
            ->setClient($this->getMock('Aws\AwsClientInterface'))
            ->setSource(__FILE__)
            ->setBucket('foo')
            ->setKey('bar')
            ->build();

        $params = $this->readAttribute($uploader, 'params');
        $this->assertArrayHasKey(Uploader::INITIATE, $params);
        $iparams = $params[Uploader::INITIATE];
        $this->assertInstanceOf('Aws\S3\Multipart\Uploader', $uploader);
        $this->assertArrayHasKey('ContentType', $iparams);
    }

    public function testCanLoadStateFromUploadId()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result([
                'Parts' => [
                    ['PartNumber' => 1, 'ETag' => 'foo', 'Size' => 1024],
                    ['PartNumber' => 2, 'ETag' => 'bar', 'Size' => 1024],
                    ['PartNumber' => 3, 'ETag' => 'baz', 'Size' => 1024],
                ]
            ])
        ]);

        $builder = (new UploadBuilder)->setClient($client);
        $method = (new \ReflectionObject($builder))
            ->getMethod('loadStateFromParams');
        $method->setAccessible(true);
        /** @var UploadState $state */
        $state = $method->invoke($builder, [
            'Bucket'   => 'foo',
            'Key'      => 'bar',
            'UploadId' => 'baz'
        ]);

        $part = $state->getUploadedParts()[3];
        $this->assertEquals(3, $part['PartNumber']);
        $this->assertEquals('baz', $part['ETag']);
    }
}
