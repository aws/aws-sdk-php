<?php
namespace Aws\Test\Multipart;

use Aws\Command;
use Aws\Exception\AwsException;
use Aws\Exception\MultipartUploadException;
use Aws\Multipart\UploadState;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7;

/**
 * @covers Aws\Multipart\AbstractUploader
 */
class AbstractUploaderTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    private function getUploaderWithState($status, array $results = [], $source = null)
    {
        $state = new UploadState(['Bucket' => 'foo', 'Key' => 'bar']);
        $state->setPartSize(2);
        $state->setStatus($status);

        return $this->getTestUploader(
            $source ?: Psr7\stream_for(),
            ['state' => $state],
            $results
        );
    }

    private function getTestUploader(
        $source = null,
        array $config = [],
        array $results = []
    ) {
        $client = $this->getTestClient('s3', [
            'validate' => false,
            'retries'  => 0,
        ]);
        $this->addMockResults($client, $results);

        return new TestUploader($client, $source ?: Psr7\stream_for(), $config);
    }

    /**
     * @expectedException \Aws\S3\Exception\S3MultipartUploadException
     */
    public function testThrowsExceptionOnBadInitiateRequest()
    {
        $uploader = $this->getUploaderWithState(UploadState::CREATED, [
            new AwsException('Failed', new Command('Initiate')),
        ]);
        $uploader->upload();
    }

    /**
     * @expectedException \LogicException
     */
    public function testThrowsExceptionIfStateIsCompleted()
    {
        $uploader = $this->getUploaderWithState(UploadState::COMPLETED);
        $this->assertTrue($uploader->getState()->isCompleted());
        $uploader->upload();
    }

    public function testSuccessfulCompleteReturnsResult()
    {
        $uploader = $this->getUploaderWithState(UploadState::CREATED, [
            new Result(), // Initiate
            new Result(), // Upload
            new Result(), // Upload
            new Result(), // Upload
            new Result(['test' => 'foo']) // Complete
        ], Psr7\stream_for('abcdef'));
        $this->assertEquals('foo', $uploader->upload()['test']);
        $this->assertTrue($uploader->getState()->isCompleted());
    }

    /**
     * @expectedException \Aws\S3\Exception\S3MultipartUploadException
     */
    public function testThrowsExceptionOnBadCompleteRequest()
    {
        $uploader = $this->getUploaderWithState(UploadState::CREATED, [
            new Result(), // Initiate
            new Result(), // Upload
            new AwsException('Failed', new Command('Complete')),
        ], Psr7\stream_for('a'));
        $uploader->upload();
    }

    public function testThrowsExceptionOnBadUploadRequest()
    {
        $uploader = $this->getUploaderWithState(UploadState::CREATED, [
            new Result(), // Initiate
            new AwsException('Failed[1]', new Command('Upload', ['PartNumber' => 1])),
            new Result(), // Upload
            new Result(), // Upload
            new AwsException('Failed[4]', new Command('Upload', ['PartNumber' => 4])),
            new Result(), // Upload
        ], Psr7\stream_for('abcdefghi'));

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

            // Test if can resume an upload.
            $serializedState = serialize($e->getState());
            $state = unserialize($serializedState);
            $secondChance = $this->getTestUploader(
                Psr7\stream_for('abcdefghi'),
                ['state' => $state],
                [
                    new Result(), // Upload
                    new Result(), // Upload
                    new Result(['foo' => 'bar']), // Upload
                ]
            );
            $result = $secondChance->upload();
            $this->assertEquals('bar', $result['foo']);
        }
    }

    public function testAsyncUpload()
    {
        $called = 0;
        $fn = function () use (&$called) {
            $called++;
        };

        $uploader = $this->getTestUploader(Psr7\stream_for('abcde'), [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'before_initiate' => $fn,
            'before_upload'   => $fn,
            'before_complete' => $fn,
        ], [
            new Result(), // Initiate
            new Result(), // Upload
            new Result(), // Upload
            new Result(), // Upload
            new Result(['test' => 'foo']) // Complete
        ]);

        $promise = $uploader->promise();
        $this->assertSame($promise, $uploader->promise());
        $this->assertInstanceOf('Aws\Result', $promise->wait());
        $this->assertEquals(5, $called);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testRequiresIdParams()
    {
        $this->getTestUploader(Psr7\stream_for());
    }

    public function testCanSetSourceFromFilenameIfExists()
    {
        $config = ['bucket' => 'foo', 'key' => 'bar'];

        // CASE 1: Filename exists.
        $uploader = $this->getTestUploader(__FILE__, $config);
        $this->assertInstanceOf(
            'Psr\Http\Message\StreamInterface',
            $this->readAttribute($uploader, 'source')
        );

        // CASE 2: Filename does not exist.
        $exception = null;
        try {
            $this->getTestUploader('non-existent-file.foobar', $config);
        } catch (\Exception $exception) {}
        $this->assertInstanceOf('RuntimeException', $exception);

        // CASE 3: Source stream is not readable.
        $exception = null;
        try {
            $this->getTestUploader(STDERR, $config);
        } catch (\Exception $exception) {}
        $this->assertInstanceOf('InvalidArgumentException', $exception);
    }

    /**
     * @param bool        $seekable
     * @param UploadState $state
     * @param array       $expectedBodies
     *
     * @dataProvider getPartGeneratorTestCases
     */
    public function testCommandGeneratorYieldsExpectedUploadCommands(
        $seekable,
        UploadState $state,
        array $expectedBodies
    ) {
        $source = Psr7\stream_for(fopen(__DIR__ . '/source.txt', 'r'));
        if (!$seekable) {
            $source = new Psr7\NoSeekStream($source);
        }

        $uploader = $this->getTestUploader($source, ['state' => $state]);
        $uploader->getState();
        $handler = function (callable $handler) {
            return function ($c, $r) use ($handler) {
                return $handler($c, $r);
            };
        };

        $actualBodies = [];
        $getUploadCommands = (new \ReflectionObject($uploader))
            ->getMethod('getUploadCommands');
        $getUploadCommands->setAccessible(true);
        foreach ($getUploadCommands->invoke($uploader, $handler) as $cmd) {
            $actualBodies[$cmd['PartNumber']] = $cmd['Body']->getContents();
        }

        $this->assertEquals($expectedBodies, $actualBodies);
    }

    public function getPartGeneratorTestCases()
    {
        $expected = [
            1 => 'AA',
            2 => 'BB',
            3 => 'CC',
            4 => 'DD',
            5 => 'EE',
            6 => 'F' ,
        ];
        $expectedSkip = $expected;
        unset($expectedSkip[1], $expectedSkip[2], $expectedSkip[4]);
        $state = new UploadState([]);
        $state->setPartSize(2);
        $stateSkip = clone $state;
        $stateSkip->markPartAsUploaded(1);
        $stateSkip->markPartAsUploaded(2);
        $stateSkip->markPartAsUploaded(4);
        return [
            [true,  $state,     $expected],
            [false, $state,     $expected],
            [true,  $stateSkip, $expectedSkip],
            [false, $stateSkip, $expectedSkip],
        ];
    }
}
