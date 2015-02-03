<?php
namespace Aws\Test\S3\Subscriber;

use Aws\S3\Exception\S3Exception;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\NoSeekStream;

/**
 * @covers Aws\S3\ApplyMd5Subscriber
 */
class ApplyMd5SubscriberTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testThrowsExceptionIfBodyIsNotSeekable()
    {
        $s3 = $this->getTestClient('s3');
        $command = $s3->getCommand('PutObject', [
            'Bucket' => 'foo',
            'Key'    => 'bar',
            'Body'   => new NoSeekStream(Stream::factory('foo')),
        ]);
        try {
            $s3->execute($command);
            $this->fail('An exception should have been thrown.');
        } catch (S3Exception $e) {
            $this->assertInstanceOf(
                'Aws\Exception\CouldNotCreateChecksumException',
                $e->getPrevious()
            );
        }
    }

    /**
     * @dataProvider getContentMd5UseCases
     */
    public function testAddsContentMd5AsAppropriate($options, $operation, $args, $md5Added, $md5Value)
    {
        $s3 = $this->getTestClient('s3', $options);
        $this->addMockResponses($s3, [new Response(200)]);

        $command = $s3->getCommand($operation, $args);
        $command->getEmitter()->on('prepared', function (PreparedEvent $e) use ($md5Added, $md5Value) {
            $this->assertSame($md5Added, $e->getRequest()->hasHeader('Content-MD5'));
            if ($md5Value !== 'SKIP') {
                $this->assertEquals($md5Value, $e->getRequest()->getHeader('Content-MD5'));
            }
        }, 'last');
        $s3->execute($command);
    }

    public function getContentMd5UseCases()
    {
        $args = ['Bucket' => 'foo', 'Key' => 'bar'];
        $md5 = base64_encode(md5('baz', true));

        return [
            // Do nothing if Content MD% was explicitly provided.
            [
                [],
                'PutObject',
                $args + ['ContentMD5' => $md5],
                true,
                $md5
            ],
            // Gets added for operations that require it
            [
                [],
                'DeleteObjects',
                ['Bucket' => 'foo', 'Delete' => ['Objects' => [['Key' => 'bar']]]],
                true,
                'SKIP'
            ],
            // Gets added for upload operations by default
            [
                [],
                'PutObject',
                $args + ['Body' => 'baz'],
                true,
                $md5,
            ],
            // Not added for upload operations when turned off at client level
            [
                ['calculate_md5' => false],
                'PutObject',
                $args + ['Body' => 'baz'],
                false,
                null,
            ],
            // Not added for operations that does not require it
            [
                [],
                'GetObject',
                $args,
                false,
                null,
            ],
            // Not added to upload operations when using SigV4
            [
                ['signature_version' => 'v4'],
                'PutObject',
                $args + ['Body' => 'baz'],
                false,
                null,
            ],
        ];
    }
}
