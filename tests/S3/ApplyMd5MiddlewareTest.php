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
                $this->assertEquals($md5Value, $request->getHeaderLine('Content-MD5'));
            })
        );
        $s3->execute($command);
    }

    public function getContentMd5UseCases()
    {
        $md5 = '/12roh/ATpPMcGD9Rj4ZlQ==';

        return [
            // Do nothing if Content MD5 was explicitly provided.
            [
                [],
                'DeleteObjects',
                ['Bucket' => 'foo', 'Delete' => ['Objects' => [['Key' => 'bar']]]],
                true,
                $md5
            ],
            // Gets added for operations that require it
            [
                [],
                'DeleteObjects',
                ['Bucket' => 'foo', 'Delete' => ['Objects' => [['Key' => 'bar']]]],
                true,
                $md5
            ],
            // Not added for operations that does not require it
            [
                [],
                'GetObject',
                ['Bucket' => 'foo', 'Key' => 'bar'],
                false,
                null,
            ],
        ];
    }
}
