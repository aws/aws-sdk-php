<?php

namespace Aws\Test\S3\Subscriber;

use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Message\Response;

/**
 * @covers Aws\S3\Subscriber\ApplyMd5
 */
class ApplyMd5Test extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider getContentMd5UseCases
     */
    public function testAddsContentMd5AsAppropriate($options, $operation, $args, $md5Added, $md5Value)
    {
        $s3 = $this->getTestClient('s3', $options);
        $this->addMockResponses($s3, [new Response(200)]);

        $command = $s3->getCommand($operation, $args);
        $command->getEmitter()->on('prepare', function (PrepareEvent $e) use ($md5Added, $md5Value) {
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

        return [
            // Gets added for operations that require it
            [
                [],
                'DeleteObjects',
                ['Bucket' => 'foo', 'Delete' => ['Objects' => [['Key' => 'bar']]]],
                true,
                'SKIP'
            ],
            // Gets added for upload operations
            [
                [],
                'PutObject',
                $args + ['Body' => 'baz'],
                true,
                base64_encode(md5('baz', true)),
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
                ['signature' => 'v4'],
                'PutObject',
                $args + ['Body' => 'baz'],
                false,
                null,
            ],
        ];
    }
}
