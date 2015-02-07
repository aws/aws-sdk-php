<?php
namespace Aws\Test\Multipart;

use Aws\Exception\MultipartUploadException;
use Aws\Multipart\Uploader;
use Aws\Multipart\UploadState;
use Aws\Result;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\Multipart\Uploader
 */
class UploaderTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \Aws\Exception\MultipartUploadException
     */
    public function testThrowsExceptionOnBadInitiateRequest()
    {
        $uploader = $this->getMockUploader(
            [$this->createMockAwsException()] // Initiate
        );
        $uploader->upload();
    }

    /**
     * @expectedException \LogicException
     */
    public function testThrowsExceptionIfStateIsCompleted()
    {
        $uploader = $this->getMockUploader([], UploadState::COMPLETED);
        $this->assertTrue($uploader->getState()->isCompleted());
        $uploader();
    }

    /**
     * @expectedException \LogicException
     */
    public function testThrowsExceptionIfStateIsAborted()
    {
        $uploader = $this->getMockUploader([], UploadState::ABORTED);
        $uploader->upload();
    }

    /**
     * @expectedException \Aws\Exception\MultipartUploadException
     */
    public function testThrowsExceptionOnBadCompleteRequest()
    {
        $uploader = $this->getMockUploader([
            new Result([]), // Initiate
            $this->createMockAwsException() // Complete
        ]);
        $uploader->upload();
    }

    public function testSuccessfulCompleteReturnsResult()
    {
        $uploader = $this->getMockUploader([
            new Result([]), // Initiate
            new Result(['test' => true]) // Complete
        ]);
        $this->assertTrue($uploader->upload()['test']);
    }

    /**
     * @expectedException \LogicException
     */
    public function testThrowsExceptionIfAbortingWhenNotInitiated()
    {
        $uploader = $this->getMockUploader();
        $uploader->abort();
    }

    /**
     * @expectedException \Aws\Exception\MultipartUploadException
     */
    public function testThrowsExceptionOnBadAbortRequest()
    {
        $uploader = $this->getMockUploader(
            [$this->createMockAwsException()], // Abort
            UploadState::INITIATED
        );
        $uploader->abort();
    }

    public function testSuccessfulAbortReturnsResult()
    {
        $uploader = $this->getMockUploader(
            [new Result(['test' => true])], // Abort
            UploadState::INITIATED
        );
        $this->assertTrue($uploader->abort()['test']);
    }

    public function testThrowsExceptionOnBadUploadRequest()
    {
        $uploader = $this->getMockUploader(
            [
                new Result([]), // Initiate
                $this->createMockAwsException('ERROR', 'Aws\Exception\AwsException', '1'),
                $this->createMockAwsException('ERROR', 'Aws\Exception\AwsException', '2'),
                $this->createMockAwsException('ERROR', 'Aws\Exception\AwsException', '3'),
            ],
            null,
            [
                ['PartNumber' => 1],
                ['PartNumber' => 2],
                ['PartNumber' => 3],
            ]
        );

        try {
            $uploader->upload(3);
            $this->fail('No exception was thrown.');
        } catch (MultipartUploadException $e) {
            $this->assertContains('Part 3', $e->getMessage());
        }
    }

    public function testCallsProvidedBeforeCallback()
    {
        $called = false;
        $uploader = $this->getMockUploader([
            new Result([]), // Initiate
            new Result([]), // Upload
            new Result([])  // Complete
        ], null, [[]]);
        $uploader->upload(1, function () use (&$called) {
            $called = true;
        });
        $this->assertTrue($called);
    }

    private function getMockUploader(
        array $results = [],
        $status = null,
        array $parts = []
    ) {
        $client = $this->getTestClient('s3', [
            'retries'  => 0,
            'validate' => false,
        ]);
        $this->addMockResults($client, $results);
        $state = new UploadState(['Bucket' => 'foo', 'Key' => 'bar']);
        $state->setStatus($status ?: UploadState::CREATED);
        $parts = new \ArrayIterator($parts);

        // Create the mock uploader
        $uploader = $this->getMockBuilder('Aws\Multipart\Uploader')
            ->setConstructorArgs([$client, $state, $parts, [
                'id' => ['Bucket', 'Key', 'UploadId'],
                'part'   => [
                    'min_size' => 5242880,
                    'max_size' => 5368709120,
                    'max_num'  => 10000,
                    'param'    => 'PartNumber',
                ],
                'initiate' => [
                    'command' => 'CreateMultipartUpload',
                    'params'  => ['fizz' => 'buzz'],
                ],
                'upload' => [
                    'command' => 'UploadPart',
                    'params'  => [],
                ],
                'complete' => [
                    'command' => 'CompleteMultipartUpload',
                    'params'  => [],
                ],
                'abort' => [
                    'command' => 'AbortMultipartUpload',
                    'params'  => [],
                ],
                'fn' => [
                    'complete' => function () {return [];},
                    'result'   => function () {},
                ]
            ]])
            ->setMethods(['getCompleteCommand'])
            ->getMockForAbstractClass();
        $uploader->expects($this->any())
            ->method('getCompleteCommand')
            ->willReturn($client->getCommand('CompleteMultipartUpload', [
                'Bucket' => 'foo',
                'Key'    => 'bar'
            ]));

        /** @var Uploader $uploader */
        return $uploader;
    }
}
