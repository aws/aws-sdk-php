<?php
namespace Aws\Test\S3;

use Aws\CommandInterface;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\Transfer;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise;
use Psr\Http\Message\RequestInterface;

/**
 * @covers Aws\S3\Transfer
 */
class TransferTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage base_dir
     */
    public function testEnsuresBaseDirIsAvailable()
    {
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, new \ArrayIterator([]), 's3://foo/bar');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage You cannot copy from s3 to s3.
     */
    public function testCannotCopyS3ToS3()
    {
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, 's3://baz/bam', 's3://foo/bar');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage You cannot copy from file to file.
     */
    public function testCannotCopyLocal()
    {
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, __DIR__, __DIR__);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage mup_threshold must be >= 5MB
     */
    public function testEnsuresMupSizeIsValid()
    {
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, __DIR__, 's3://foo/bar', ['mup_threshold' => 10]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage source must be the path to a directory or an
     *                           iterator that yields file names
     */
    public function testEnsuresSourceIsValid()
    {
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, false, 's3://foo/bar');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Scheme must be "s3" or "file"
     */
    public function testEnsuresValidScheme()
    {
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, __DIR__, 'monkey://foo/bar');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage before must be a callable
     */
    public function testEnsuresBeforeIsCallable()
    {
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, __DIR__, 's3://foo/bar', ['before' => 'cheese']);
    }

    public function testCanSetBeforeOptionForUploadsAndUsedWithDebug()
    {
        $s3 = $this->getTestClient('s3');
        $s3->getHandlerList()->appendSign(
            $this->mockResult(function() {
                return new Result();
            }),
            's3.test'
        );

        $c = [];
        $i = \Aws\recursive_dir_iterator(__DIR__);
        $t = new Transfer($s3, $i, 's3://foo/bar', [
            'before' => function ($command) use (&$c) {
                $c[] = $command;
            },
            'debug' => true,
            'base_dir' => __DIR__,
        ]);

        ob_start();
        $p = $t->promise();
        $p2 = $t->promise();
        $this->assertSame($p, $p2);
        $p->wait();
        $output = ob_get_clean();
        $this->assertNotEmpty($c);

        /** @var CommandInterface $test */
        foreach ($c as $test) {
            $this->assertEquals('PutObject', $test->getName());
            $this->assertEquals('foo', $test['Bucket']);
            $this->assertStringStartsWith('bar/', $test['Key']);
            $this->assertContains($test['SourceFile'] . ' -> s3://foo/bar', $output);
        }
    }

    public function testDoesMultipartForLargeFiles()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [
            new Result(['UploadId' => '123']),
            new Result(['ETag' => 'a']),
            new Result(['ETag' => 'b']),
            new Result(['UploadId' => '123']),
        ]);

        $dir = sys_get_temp_dir() . '/unittest';
        `rm -rf $dir`;
        mkdir($dir);
        $filename = $dir . '/large.txt';
        $f = fopen($filename, 'w+');
        $line = str_repeat('.', 1024);
        for ($i = 0; $i < 6000; $i++) {
            fwrite($f, $line);
        }
        fclose($f);

        $res = fopen('php://temp', 'r+');
        $t = new Transfer($s3, $dir, 's3://foo/bar', [
            'mup_threshold' => 5248000,
            'debug' => $res
        ]);

        $t->transfer();
        rewind($res);
        $output = stream_get_contents($res);
        $this->assertContains("Transferring $filename -> s3://foo/bar/large.txt (UploadPart) : Part=1", $output);
        `rm -rf $dir`;
    }

    public function testDownloadsObjects()
    {
        $s3 = $this->getTestClient('s3');
        $lso = [
            'IsTruncated' => false,
            'Contents' => [
                ['Key' => 'bar/f/'],
                ['Key' => 'bar/a/b'],
                ['Key' => 'bar/c/d'],
            ]
        ];
        $this->addMockResults($s3, [
            new Result($lso),
            new Result(['Body' => 'test']),
            new Result(['Body' => '123']),
        ]);

        $dir = sys_get_temp_dir() . '/unittest';
        `rm -rf $dir`;
        mkdir($dir);
        $res = fopen('php://temp', 'r+');
        $t = new Transfer($s3, 's3://foo/bar', $dir, ['debug' => $res]);
        $t->transfer();
        rewind($res);
        $output = stream_get_contents($res);
        $this->assertContains('s3://foo/bar/a/b -> ', $output);
        $this->assertContains('s3://foo/bar/c/d -> ', $output);
        `rm -rf $dir`;
    }

    public function testCanUploadToBareBucket()
    {
        $s3 = $this->getMockS3Client();
        $filesInDirectory = array_filter(
            iterator_to_array(\Aws\recursive_dir_iterator(__DIR__)),
            function ($path) { return !is_dir($path); }
        );

        $s3->expects($this->exactly(count($filesInDirectory)))
            ->method('getCommand')
            ->with(
                'PutObject',
                new \PHPUnit_Framework_Constraint_Callback(function (array $args) use ($filesInDirectory) {
                    return 'bare-bucket' === $args['Bucket']
                        && in_array($args['SourceFile'], $filesInDirectory)
                        && __DIR__ . '/' . $args['Key'] === $args['SourceFile'];
                })
            )
            ->willReturn($this->getMockBuilder('Aws\CommandInterface')->getMock());

        (new Transfer($s3, __DIR__, 's3://bare-bucket'))
            ->transfer();
    }

    public function testCanUploadFilesYieldedBySourceIterator()
    {
        $s3 = $this->getMockS3Client();
        $justThisFile = array_filter(
            iterator_to_array(\Aws\recursive_dir_iterator(__DIR__)),
            function ($path) { return $path === __FILE__; }
        );

        $s3->expects($this->once())
            ->method('getCommand')
            ->with(
                'PutObject',
                new \PHPUnit_Framework_Constraint_Callback(function (array $args) {
                    return 'bucket' === $args['Bucket']
                    && $args['SourceFile'] === __FILE__
                    && __DIR__ . '/' . $args['Key'] === $args['SourceFile'];
                })
            )
            ->willReturn($this->getMockBuilder('Aws\CommandInterface')->getMock());

        $uploader = new Transfer($s3, new \ArrayIterator($justThisFile), 's3://bucket', [
            'base_dir' => __DIR__,
        ]);

        $uploader->transfer();
    }

    public function testCanDownloadFilesYieldedBySourceIterator()
    {
        $s3 = $this->getMockS3Client();
        $justOneFile = new \ArrayIterator(['s3://bucket/path/to/key']);

        $s3->expects($this->once())
            ->method('getCommand')
            ->with(
                'GetObject',
                new \PHPUnit_Framework_Constraint_Callback(function (array $args) {
                    return 'bucket' === $args['Bucket']
                    && $args['Key'] === 'path/to/key';
                })
            )
            ->willReturn($this->getMockBuilder('Aws\CommandInterface')->getMock());

        $downloader = new Transfer($s3, $justOneFile, sys_get_temp_dir() . '/downloads', [
            'base_dir' => 's3://bucket/path',
        ]);

        $downloader->transfer();
    }

    private function mockResult(callable $fn)
    {
        return function (callable $handler) use ($fn) {
            return function (
                CommandInterface $command,
                RequestInterface $request = null
            ) use ($handler, $fn) {
                return Promise\promise_for($fn($command, $request));
            };
        };
    }

    /** @return S3Client|\PHPUnit_Framework_MockObject_MockObject */
    private function getMockS3Client()
    {
        return $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}
