<?php

namespace Aws\Test\Glacier;

use Aws\Glacier\TreeHash;
use Aws\Multipart\UploadState;
use Aws\Glacier\UploadBuilder;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Stream\Stream;

/**
 * @covers Aws\Glacier\UploadBuilder
 */
class UploadBuilderTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCanCreateBuilder()
    {
        $builder = (new UploadBuilder)
            ->setClient($this->getMock('Aws\AwsClientInterface'))
            ->setSource(__FILE__)
            ->setAccountId('foo')
            ->setVaultName('bar')
            ->setArchiveDescription('baz');
        $builder2 = clone $builder;

        $uploader = $builder->build();
        $config = $this->readAttribute($uploader, 'config');
        $params = $config['initiate']['params'];
        $this->assertInstanceOf('Aws\Multipart\Uploader', $uploader);
        $this->assertArrayHasKey('archiveDescription', $params);
        $this->assertArrayHasKey('partSize', $params);

        $builder2->setUploadId('baz');
        $this->assertEquals(
            ['accountId' => 'foo', 'vaultName' => 'bar', 'uploadId' => 'baz'],
            $this->readAttribute($builder2, 'uploadId')
        );
    }

    public function testThrowsExceptionOnBadPartSize()
    {
        $uploader = (new UploadBuilder)
            ->setClient($this->getMock('Aws\AwsClientInterface'))
            ->setSource(__FILE__)
            ->setVaultName('foo')
            ->setPartSize(1024);

        $this->setExpectedException('InvalidArgumentException');
        $uploader->build();
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
            ->getMethod('loadStateByUploadId');
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

    public function testCanCreatePartGeneratorCallback()
    {
        $source = Stream::factory('foo');
        $state = new UploadState([]);
        $state->setPartSize(5);
        $builder = (new UploadBuilder)
            ->setClient($this->getTestClient('glacier'))
            ->setState($state)
            ->setSource($source);

        $method = (new \ReflectionObject($builder))
            ->getMethod('getCreatePartFn');
        $method->setAccessible(true);
        /** @var callable $createPart */
        $createPart = $method->invoke($builder);

        $data = $createPart(true);
        // Range is an odd value here, because we are using a non-file stream
        $this->assertEquals('bytes 0--1/*', $data['range']);
        $this->assertInstanceOf('GuzzleHttp\Stream\LimitStream', $data['body']);

        $source->seek(0);
        $data = $createPart(false);
        $this->assertEquals('bytes 0-2/*', $data['range']);
        $this->assertInstanceOf('GuzzleHttp\Stream\Stream', $data['body']);
        $this->assertArrayHasKey('checksum', $data);
        $this->assertArrayHasKey('ContentSHA256', $data);
    }

    public function testCanParseARange()
    {
        $builder = new UploadBuilder;
        $method = (new \ReflectionObject($builder))->getMethod('parseRange');
        $method->setAccessible(true);
        $data = $method->invoke($builder, 'bytes 2097152-4194303/*', 2097152);
        $this->assertEquals(2097152, $data['Size']);
        $this->assertEquals(2, $data['PartNumber']);
    }

    public function testCallbackCreatesCorrectCompleteCommandParams()
    {
        // Create dummy hashes.
        $checksums = [
            hash('sha256', 'a'),
            hash('sha256', 'b'),
            hash('sha256', 'c'),
        ];
        $treeHash = new TreeHash();
        foreach ($checksums as $checksum) {
            $treeHash->addChecksum($checksum);
        }
        $expectedChecksum = bin2hex($treeHash->complete());

        // Prepare state.
        $state = new UploadState([]);
        $parts = [
            1 => ['size' => 3, 'checksum' => $checksums[0]],
            2 => ['size' => 1, 'checksum' => $checksums[1]],
            3 => ['size' => 5, 'checksum' => $checksums[2]],
        ];
        foreach ($parts as $number => $data) {
            $state->markPartAsUploaded($number, $data);
        }

        // Prepare builder.
        $builder = (new UploadBuilder)
            ->setClient($this->getTestClient('s3'))
            ->setState($state)
            ->setSource(Stream::factory('foo'));

        // Get the function.
        $method = (new \ReflectionObject($builder))
            ->getMethod('getCompleteParamsFn');
        $method->setAccessible(true);
        /** @var callable $getCommandParams */
        $getCommandParams = $method->invoke($builder);
        
        // Validate function results.
        $params = $getCommandParams();
        $this->assertEquals(9, $params['archiveSize']);
        $this->assertEquals($expectedChecksum, $params['checksum']);
    }

    public function testCallbackHandlesResultsOfUploadPart()
    {
        $state = new UploadState([]);
        $state->setPartSize(2097152);

        $builder = (new UploadBuilder)
            ->setClient($this->getTestClient('s3'))
            ->setState($state)
            ->setSource(Stream::factory('foo'));

        $method = (new \ReflectionObject($builder))
            ->getMethod('getResultHandlerFn');
        $method->setAccessible(true);
        /** @var callable $handleResult */
        $handleResult = $method->invoke($builder);

        // Mock arguments.
        $command = $this->getMockBuilder('GuzzleHttp\Command\Command')
            ->disableOriginalConstructor()
            ->getMock();
        $command->method('offsetGet')
            ->willReturnOnConsecutiveCalls('0-2097151', 'foo');
        $result = $this->getMockBuilder('Aws\Result')
            ->disableOriginalConstructor()
            ->getMock();

        $handleResult($command, $result);

        $uploadedParts = $state->getUploadedParts();
        $this->assertTrue(isset($uploadedParts[1]['checksum']));
        $this->assertEquals('foo', $uploadedParts[1]['checksum']);
    }
}
