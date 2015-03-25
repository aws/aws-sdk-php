<?php
namespace Aws\Test\Multipart;

use Aws\Command;
use Aws\Exception\AwsException;
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

    private function getUploader(array $results = [], $status = null, $parts = 1) {
        $client = $this->getTestClient('s3', [
            'validate' => false,
            'retries'  => 0,
        ]);
        $this->addMockResults($client, $results);
        $state = new UploadState(['Bucket' => 'foo', 'Key' => 'bar']);
        $state->setStatus($status ?: UploadState::CREATED);
        $parts = new \ArrayIterator(array_map(function ($n) {
            return ['PartNumber' => $n];
        }, range(1, $parts)));

        return new Uploader($client, $state, $parts, [
            'id' => ['Bucket', 'Key', 'UploadId'],
            'part' => [
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
                'complete' => function () {
                   return [];
                },
                'result'   => function ($command) use ($state) {
                    $state->markPartAsUploaded($command['PartNumber']);
                }
            ]
        ]);
    }

    /**
     * @expectedException \Aws\Exception\MultipartUploadException
     */
    public function testThrowsExceptionOnBadInitiateRequest()
    {
        $uploader = $this->getUploader([
            new AwsException('Failed', new Command('Initiate')),
        ]);
        $uploader->upload();
    }

    /**
     * @expectedException \LogicException
     */
    public function testThrowsExceptionIfStateIsCompleted()
    {
        $uploader = $this->getUploader([], UploadState::COMPLETED);
        $this->assertTrue($uploader->getState()->isCompleted());
        $uploader->upload();
    }

    /**
     * @expectedException \LogicException
     */
    public function testThrowsExceptionIfStateIsAborted()
    {
        $uploader = $this->getUploader([], UploadState::ABORTED);
        $uploader->upload();
    }

    /**
     * @expectedException \Aws\Exception\MultipartUploadException
     */
    public function testThrowsExceptionOnBadAbortRequest()
    {
        $uploader = $this->getUploader([
            new AwsException('Failed', new Command('Abort')),
        ], UploadState::INITIATED);
        $uploader->abort();
    }

    /**
     * @expectedException \LogicException
     */
    public function testThrowsExceptionIfAbortingWhenNotInitiated()
    {
        $uploader = $this->getUploader();
        $uploader->abort();
    }

    public function testSuccessfulAbortReturnsResult()
    {
        $uploader = $this->getUploader([
            new Result(['test' => true]), // Abort
        ], UploadState::INITIATED);
        $this->assertTrue($uploader->abort()['test']);
    }

    public function testSuccessfulCompleteReturnsResult()
    {
        $uploader = $this->getUploader([
            new Result(), // Initiate
            new Result(), // Upload
            new Result(), // Upload
            new Result(), // Upload
            new Result(['test' => 'foo']) // Complete
        ], null, 3);

        // Setup a "before" function
        $beforeCalled = 0;
        $before = function () use (&$beforeCalled) {
            $beforeCalled++;
        };

        $finalResult = $uploader->upload(3, $before);
        $this->assertEquals('foo', $finalResult['test']);

        // See if the before was called the expected number of times.
        $this->assertEquals(3, $beforeCalled);
    }

    /**
     * @expectedException \Aws\Exception\MultipartUploadException
     */
    public function testThrowsExceptionOnBadCompleteRequest()
    {
        $uploader = $this->getUploader([
            new Result(), // Initiate
            new Result(), // Upload
            new AwsException('Failed', new Command('Complete')),
        ]);
        $uploader->upload();
    }

    public function testThrowsExceptionOnBadUploadRequest()
    {
        $uploader = $this->getUploader([
            new Result(), // Initiate
            new AwsException('Failed[1]', new Command('Upload', ['PartNumber' => 1])),
            new Result(), // Upload
            new Result(), // Upload
            new AwsException('Failed[4]', new Command('Upload', ['PartNumber' => 4])),
            new Result(), // Upload
        ], null, 5);

        try {
            $uploader->upload();
            $this->fail('No exception was thrown.');
        } catch (MultipartUploadException $e) {
            $message = $e->getMessage();
            $this->assertContains('Failed[1]', $message);
            $this->assertContains('Failed[4]', $message);
            $uploadedParts = $e->getState()->getUploadedParts();
            $this->assertCount(3, $uploadedParts);
            $this->assertArrayHasKey(2, $uploadedParts);
            $this->assertArrayHasKey(3, $uploadedParts);
            $this->assertArrayHasKey(5, $uploadedParts);
        }
    }
}
