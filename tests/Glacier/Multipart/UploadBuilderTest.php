<?php

namespace Aws\Test\Glacier\Multipart;

use Aws\Common\Multipart\UploadState;
use Aws\Glacier\Multipart\UploadBuilder;
use Aws\Glacier\Multipart\Uploader;
use Aws\Common\Result;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\Glacier\Multipart\UploadBuilder
 */
class UploadBuilderTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCanCreateBuilder()
    {
        $uploader = (new UploadBuilder)
            ->setClient($this->getMock('Aws\Common\AwsClientInterface'))
            ->setSource(__FILE__)
            ->setAccountId('foo')
            ->setVaultName('bar')
            ->setArchiveDescription('baz')
            ->build();

        $params = $this->readAttribute($uploader, 'params')[Uploader::INITIATE];
        $this->assertInstanceOf('Aws\Glacier\Multipart\Uploader', $uploader);
        $this->assertArrayHasKey('archiveDescription', $params);
        $this->assertArrayHasKey('partSize', $params);
    }

    public function testCanLoadStateFromUploadId()
    {
        $client = $this->getTestClient('glacier');
        $this->addMockResults($client, [
            new Result([
                'PartSizeInBytes' => 1048576,
                'Parts' => [
                    ['RangeInBytes' => '0-1048575', 'SHA256TreeHash' => 'foo'],
                    ['RangeInBytes' => '1048576-2097151', 'SHA256TreeHash' => 'bar'],
                ]
            ])
        ]);

        $builder = (new UploadBuilder)->setClient($client);
        $method = (new \ReflectionObject($builder))
            ->getMethod('loadStateFromParams');
        $method->setAccessible(true);
        /** @var UploadState $state */
        $state = $method->invoke($builder, [
            'accountId' => '-',
            'vaultName' => 'foo',
            'uploadId'  => 'bar'
        ]);

        $part = $state->getUploadedParts()[2];
        $this->assertEquals(1048576, $part['size']);
        $this->assertEquals('bar', $part['checksum']);
    }
}
