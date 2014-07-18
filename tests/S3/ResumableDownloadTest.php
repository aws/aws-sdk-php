<?php
namespace Aws\Tests\S3;

use Aws\S3\ResumableDownload;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Subscriber\History;

/**
 * @covers Aws\S3\ResumableDownload
 */
class ResumableDownloadTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testEnsuresFilesCanBeOpened()
    {
        $client = $this->getTestClient('s3');
        new ResumableDownload([
            'client' => $client,
            'target' => '/does/not/exist/foo',
            'params' => [
                'Bucket' => 'test',
                'Key' => 'key'
            ]
        ]);
    }

    public function testDownloadsUsingRangeRequests()
    {
        $client = $this->getTestClient('s3');
        $mock = new Mock([
            new Response(200, [
                'Content-Length' => 9,
                'ETag'           => '"098f6bcd4621d373cade4e832627b4f6"'
            ]),
            new Response(200, ['Content-Length' => 5], Stream::factory('_test'))
        ]);

        $history = new History();
        $client->getHttpClient()->getEmitter()->attach($mock);
        $client->getHttpClient()->getEmitter()->attach($history);

        $target = Stream::factory('test');
        $target->seek(0, SEEK_END);
        $resumable = new ResumableDownload([
            'client' => $client,
            'target' => $target,
            'params' => [
                'Bucket' => 'test',
                'Key' => 'key'
            ]
        ]);
        $resumable();

        $mocked = $history->getRequests();
        $this->assertCount(2, $mocked);
        $this->assertEquals('HEAD', $mocked[0]->getMethod());
        $this->assertEquals('GET', $mocked[1]->getMethod());
        $this->assertEquals('bytes=4-8', $mocked[1]->getHeader('Range'));
    }

    public function testSkipsIntegrityChecksOnNonStandardEtags()
    {
        $client = $this->getTestClient('s3');
        $mock = new Mock([
            new Response(200, [
                'Content-Length' => 2,
                'ETag'           => '"aef/123"'
            ]),
            new Response(200, ['Content-Length' => 2], Stream::factory('hi'))
        ]);

        $client->getHttpClient()->getEmitter()->attach($mock);

        $target = Stream::factory();
        $resumable = new ResumableDownload([
            'client' => $client,
            'target' => $target,
            'params' => [
                'Bucket' => 'test',
                'Key' => 'key'
            ]
        ]);

        $resumable();
    }

    public function testDoesNotDownloadWhenNotNeeded()
    {
        $client = $this->getTestClient('s3');
        $mock = new Mock([
            new Response(200, ['Content-Length' => 2])
        ]);
        $history = new History();
        $client->getHttpClient()->getEmitter()->attach($mock);
        $client->getHttpClient()->getEmitter()->attach($history);
        $target = Stream::factory('hi');
        $target->seek(0, SEEK_END);
        $resumable = new ResumableDownload([
            'client' => $client,
            'target' => $target,
            'params' => [
                'Bucket' => 'test',
                'Key' => 'key'
            ]
        ]);
        $resumable();
        $this->assertCount(1, $history);
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage Message integrity check failed. Expected 5032561e973f16047f3109e6a3f7f173 but got e78582c7fa761cb9358009503f2810a9
     */
    public function testEnsuresMd5Match()
    {
        $client = $this->getTestClient('s3');
        $mock = new Mock([
            new Response(200, [
                'Content-Length' => 15,
                'ETag'           => '"5032561e973f16047f3109e6a3f7f173"'
            ]),
            new Response(200, ['Content-Length' => 1], Stream::factory('1'))
        ]);

        $client->getHttpClient()->getEmitter()->attach($mock);
        $target = Stream::factory('11111111111111');
        $target->seek(0, SEEK_END);

        $resumable = new ResumableDownload([
            'client' => $client,
            'target' => $target,
            'params' => [
                'Bucket' => 'test',
                'Key' => 'key'
            ]
        ]);

        $resumable->transfer();
    }
}
