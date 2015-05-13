<?php
namespace Aws\Test\S3;

use Aws\Middleware;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;

/**
 * @covers Aws\S3\ApplyMd5Middleware
 */
class ApplyMd5MiddlewareTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \Aws\Exception\CouldNotCreateChecksumException
     */
    public function testThrowsExceptionIfBodyIsNotSeekable()
    {
        $s3 = $this->getTestClient('s3');
        $command = $s3->getCommand('PutObject', [
            'Bucket' => 'foo',
            'Key'    => 'bar',
            'Body'   => new Psr7\NoSeekStream(Psr7\stream_for('foo')),
        ]);
        $s3->execute($command);
    }

    /**
     * @dataProvider getContentMd5UseCases
     */
    public function testAddsContentMd5AsAppropriate($options, $operation, $args, $md5Added, $md5Value)
    {
        $s3 = $this->getTestClient('s3', $options);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand($operation, $args);
        $command->getHandlerList()->appendBuild(
            Middleware::tap(function ($cmd, RequestInterface $request) use ($md5Added, $md5Value) {
                $this->assertSame($md5Added, $request->hasHeader('Content-MD5'));
                if ($md5Value !== 'SKIP') {
                    $this->assertEquals($md5Value, $request->getHeaderLine('Content-MD5'));
                }
            })
        );
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
