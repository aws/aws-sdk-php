<?php
namespace Aws\Test\S3;

use Aws\CommandInterface;
use Aws\HandlerList;
use Aws\Middleware;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\Transfer;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise;
use PHPUnit\Framework\Constraint\Callback;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use SplFileInfo;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Transfer::class)]
class TransferTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * Helper method to recursively delete a directory
     */
    private function deleteDirectory($dir)
    {
        if (!is_dir($dir)) {
            return;
        }

        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            $path = $dir . DIRECTORY_SEPARATOR . $file;
            if (is_dir($path)) {
                $this->deleteDirectory($path);
            } else {
                unlink($path);
            }
        }
        rmdir($dir);
    }

    public function testEnsuresBaseDirIsAvailable()
    {
        $this->expectExceptionMessage("base_dir");
        $this->expectException(\InvalidArgumentException::class);
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, new \ArrayIterator([]), 's3://foo/bar');
    }

    public function testCannotCopyS3ToS3()
    {
        $this->expectExceptionMessage("You cannot copy from s3 to s3.");
        $this->expectException(\InvalidArgumentException::class);
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, 's3://baz/bam', 's3://foo/bar');
    }

    public function testCannotCopyLocal()
    {
        $this->expectExceptionMessage("You cannot copy from file to file.");
        $this->expectException(\InvalidArgumentException::class);
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, __DIR__, __DIR__);
    }

    public function testEnsuresMupSizeIsValid()
    {
        $this->expectExceptionMessage("mup_threshold must be >= 5MB");
        $this->expectException(\InvalidArgumentException::class);
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, __DIR__, 's3://foo/bar', ['mup_threshold' => 10]);
    }

    public function testEnsuresSourceIsValid()
    {
        $this->expectExceptionMessage("source must be the path to a directory or an iterator that yields file names");
        $this->expectException(\InvalidArgumentException::class);
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, false, 's3://foo/bar');
    }

    public function testEnsuresValidScheme()
    {
        $this->expectExceptionMessage("Scheme must be \"s3\" or \"file\"");
        $this->expectException(\InvalidArgumentException::class);
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, __DIR__, 'monkey://foo/bar');
    }

    public function testEnsuresBeforeIsCallable()
    {
        $this->expectExceptionMessage("before must be a callable");
        $this->expectException(\InvalidArgumentException::class);
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
        $i = \Aws\recursive_dir_iterator(__DIR__ . '/Crypto');
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
            $this->assertSame('PutObject', $test->getName());
            $this->assertSame('foo', $test['Bucket']);
            $this->assertStringStartsWith('bar/', $test['Key']);
            if ($test['SourceFile'] !== null) {
                $normalizedSourceFile = str_replace('\\', '/', $test['SourceFile']);
                $this->assertStringContainsString($normalizedSourceFile . ' -> s3://foo/bar', $output);
            }
        }
    }

    public function testEnsuresAfterIsCallable()
    {
        $this->expectExceptionMessage("after must be a callable");
        $this->expectException(\InvalidArgumentException::class);
        $s3 = $this->getTestClient('s3');
        new Transfer($s3, __DIR__, 's3://foo/bar', ['after' => 'cheese']);
    }

    public function testCanSetAfterOptionForUploads()
    {
        $s3 = $this->getTestClient('s3');
        $s3->getHandlerList()->appendInit(
            $this->mockResult(function() {
                return new Result(['ObjectURL' => 'file_url']);
            }),
            's3.test'
        );

        $path = __DIR__ . '/Crypto';
        $filesCount = iterator_count(\Aws\recursive_dir_iterator($path));

        $results = [];
        $indices = [];
        $aggregatePromises = [];

        $i = \Aws\recursive_dir_iterator($path);
        $t = new Transfer($s3, $i, 's3://foo/bar', [
            'after' => function ($result, $index, $aggregatePromise) use (&$results, &$indices, &$aggregatePromises) {
                $results[] = $result;
                $indices[] = $index;
                $aggregatePromises[] = $aggregatePromise;
            },
            'debug' => true,
            'base_dir' => __DIR__,
        ]);

        ob_start();
        $p = $t->promise();
        $p2 = $t->promise();
        $this->assertSame($p, $p2);
        $p->wait();
        ob_get_clean();
        $this->assertNotEmpty($results);
        $this->assertNotEmpty($indices);
        $this->assertNotEmpty($aggregatePromises);

        $this->assertCount($filesCount, $results);
        $this->assertCount($filesCount, $indices);
        $this->assertCount($filesCount, $aggregatePromises);

        /** @var Result $result */
        foreach ($results as $result) {
            $this->assertIsIterable($result);
            $this->assertArrayHasKey("ObjectURL", iterator_to_array($result));
            $this->assertSame("file_url", $result["ObjectURL"]);
        }
        $this->assertSame(range(0, $filesCount-1), $indices);
        /** @var Promise\Promise $aggregatePromise */
        foreach ($aggregatePromises as $aggregatePromise) {
            $this->assertSame('fulfilled', $aggregatePromise->getState());
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

        $s3->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd, RequestInterface $req) {
                $name = $cmd->getName();
                if ($name === 'UploadPart') {
                    $this->assertTrue(isset($command['ContentMD5']));
                }
            }
        ));

        $dir = sys_get_temp_dir() . '/unittest';
        $this->deleteDirectory($dir);
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
            'debug' => $res,
        ]);

        $t->transfer();
        rewind($res);
        $output = stream_get_contents($res);
        $normalizedFilename = str_replace('\\', '/', $filename);
        $this->assertStringContainsString("Transferring $normalizedFilename -> s3://foo/bar/large.txt (UploadPart) : Part=1", $output);
        $this->deleteDirectory($dir);
    }

    public function testDoesMultipartForLargeFilesWithFileInfoAsSource()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [
            new Result(['UploadId' => '123']),
            new Result(['ETag' => 'a']),
            new Result(['ETag' => 'b']),
            new Result(['UploadId' => '123']),
        ]);

        $dir = sys_get_temp_dir() . '/unittest';
        $this->deleteDirectory($dir);
        mkdir($dir);
        $filename = new SplFileInfo($dir . '/large.txt');
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
        $normalizedFilename = str_replace('\\', '/', (string)$filename);
        $this->assertStringContainsString("Transferring $normalizedFilename -> s3://foo/bar/large.txt (UploadPart) : Part=1", $output);
        $this->deleteDirectory($dir);
    }

    public function testDownloadsObjects()
    {
        $s3 = $this->getTestClient('s3');
        $lso = [
            'IsTruncated' => false,
            'Contents' => [
                ['Key' => 'bar/f/'],
                ['Key' => 'bar/c//d'],
            ]
        ];
        $this->addMockResults($s3, [
            new Result($lso),
            new Result(['Body' => 'test']),
        ]);

        $dir = sys_get_temp_dir() . '/unittest';
        $this->deleteDirectory($dir);
        mkdir($dir);
        $res = fopen('php://temp', 'r+');
        $t = new Transfer($s3, 's3://foo/bar', $dir, ['debug' => $res]);
        $t->transfer();
        rewind($res);
        $output = stream_get_contents($res);
        $this->assertStringContainsString('s3://foo/bar/c//d -> ', $output);
        $this->deleteDirectory($dir);
    }

    public function testDebugFalse()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [
            new Result(['UploadId' => '123']),
            new Result(['ETag' => 'a']),
            new Result(['ETag' => 'b']),
            new Result(['UploadId' => '123']),
        ]);

        $dir = sys_get_temp_dir() . '/unittest';
        $this->deleteDirectory($dir);
        mkdir($dir);
        $filename = $dir . '/large.txt';
        $f = fopen($filename, 'w+');
        fwrite($f, '...');
        fclose($f);

        $t = new Transfer($s3, $dir, 's3://foo/bar', [
            'debug' => false
        ]);

        $this->assertNull($t->transfer());
    }

    public function testDownloadsObjectsWithAccessPointArn()
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('S3 access point ARN downloads have path handling issues on Windows');
        }

        $s3 = $this->getTestClient('s3');
        $s3->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd, RequestInterface $req) {
                $this->assertSame(
                    'myaccess-123456789012.s3-accesspoint.us-east-1.amazonaws.com',
                    $req->getUri()->getHost()
                );
            }
        ));

        $lso = [
            'IsTruncated' => false,
            'Contents' => [
                ['Key' => 'bar/f/'],
                ['Key' => 'bar/../bar/a/b'],
                ['Key' => 'bar/c//d'],
                ['Key' => '../bar//c/../a/b/..'],
            ]
        ];
        $this->addMockResults($s3, [
            new Result($lso),
            new Result(['Body' => 'test']),
            new Result(['Body' => '123']),
            new Result(['Body' => 'abc']),
        ]);

        $dir = sys_get_temp_dir() . '/unittest';
        $this->deleteDirectory($dir);
        mkdir($dir);
        $res = fopen('php://temp', 'r+');
        $t = new Transfer($s3, 's3://arn:aws:s3:us-east-1:123456789012:accesspoint:myaccess/test_key', $dir, ['debug' => $res]);
        $t->transfer();
        rewind($res);
        $output = stream_get_contents($res);
        $this->assertStringContainsString('s3://arn:aws:s3:us-east-1:123456789012:accesspoint:myaccess/bar/../bar/a/b -> ', $output);
        $this->assertStringContainsString('s3://arn:aws:s3:us-east-1:123456789012:accesspoint:myaccess/bar/c//d -> ', $output);
        $this->assertStringContainsString('s3://arn:aws:s3:us-east-1:123456789012:accesspoint:myaccess/../bar//c/../a/b/.. -> ', $output);
        $this->deleteDirectory($dir);
    }

    #[DataProvider('providedPathsOutsideTarget')]
    public function testCannotDownloadObjectsOutsideTarget($key)
    {
        $this->expectException(\Aws\Exception\AwsException::class);
        $s3 = $this->getTestClient('s3');
        $lso = [
            'IsTruncated' => false,
            'Contents' => [
                ['Key' => $key]
            ]
        ];
        $this->addMockResults($s3, [
            new Result($lso),
            new Result(['Body' => 'test']),
            new Result(['Body' => '123']),
        ]);

        $dir = sys_get_temp_dir() . '/unittest';
        $this->deleteDirectory($dir);
        mkdir($dir);
        $res = fopen('php://temp', 'r+');
        $t = new Transfer($s3, 's3://foo/bar/', $dir, ['debug' => $res]);
        $t->transfer();
        rewind($res);
        $output = stream_get_contents($res);
        $this->assertStringContainsString('s3://foo/bar/' . $key . ' -> ', $output);
        $this->deleteDirectory($dir);
    }

    public static function providedPathsOutsideTarget(): array
    {
        return [
            ['bar/../a/b'],
            //ensures if path resolves to target directory
            //that exact match is needed
            ['bar/../unittest-2/b'],
            ['bar/../../a/b'],
            ['bar/../c/../../d'],
            ['bar///../../a/b/c'],
            ['bar//../../a/b/./c'],
        ];
    }

    public function testCanUploadToBareBucket()
    {
        $s3 = $this->getMockS3Client();
        $filesInDirectory = array_filter(
            iterator_to_array(\Aws\recursive_dir_iterator(__DIR__)),
            function ($path) { return !is_dir($path); }
        );

        // Normalize all paths to use forward slashes for comparison
        $normalizedFiles = array_map(function($path) {
            return str_replace('\\', '/', $path);
        }, $filesInDirectory);

        $s3->expects($this->exactly(count($filesInDirectory)))
            ->method('getCommand')
            ->with(
                'PutObject',
                new Callback(function (array $args) use ($normalizedFiles) {
                    $baseDir = str_replace('\\', '/', realpath(__DIR__));
                    $sourceFile = str_replace('\\', '/', $args['SourceFile']);

                    // Calculate expected key - relative path from base directory
                    if (strpos($sourceFile, $baseDir . '/') === 0) {
                        $expectedKey = substr($sourceFile, strlen($baseDir) + 1);
                    } else {
                        $expectedKey = basename($sourceFile);
                    }

                    return 'bare-bucket' === $args['Bucket']
                        && in_array($sourceFile, $normalizedFiles)  // Compare normalized paths
                        && $args['Key'] === $expectedKey;
                })
            )
            ->willReturn($this->getMockBuilder(CommandInterface::class)->getMock());

        (new Transfer($s3, __DIR__, 's3://bare-bucket'))
            ->transfer();
    }

    public function testCanUploadFilesYieldedBySourceIterator()
    {
        $s3 = $this->getMockS3Client();
        $justThisFile = array_filter(
            iterator_to_array(\Aws\recursive_dir_iterator(__DIR__)),
            static function ($path) {
                return realpath($path) === realpath(__FILE__);
            }
        );

        $s3->expects($this->once())
            ->method('getCommand')
            ->with(
                'PutObject',
                new Callback(function (array $args) {
                    return 'bucket' === $args['Bucket']
                        && realpath($args['SourceFile']) === realpath(__FILE__)
                        && realpath(__DIR__ . '/' . $args['Key']) === realpath($args['SourceFile']);
                })
            )
            ->willReturn($this->getMockBuilder(CommandInterface::class)->getMock());

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
                new Callback(function (array $args) {
                    return 'bucket' === $args['Bucket']
                        && $args['Key'] === 'path/to/key';
                })
            )
            ->willReturn($this->getMockBuilder(CommandInterface::class)->getMock());

        $downloader = new Transfer($s3, $justOneFile, sys_get_temp_dir() . '/downloads', [
            'base_dir' => 's3://bucket/path',
        ]);

        $downloader->transfer();
    }

    public function testAddContentMd5EmitsDeprecationWarning()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, []);
        set_error_handler(function ($err, $message) {
            throw new \RuntimeException($message);
        }, E_USER_DEPRECATED);
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('S3 no longer supports MD5 checksums.');
        $s3->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd, RequestInterface $req) {
                $this->assertTrue(isset($command['x-amz-checksum-crc32']));
            }
        ));

        $dir = sys_get_temp_dir() . '/unittest';
        $this->deleteDirectory($dir);
        mkdir($dir);
        $filename = $dir . '/foo.txt';
        $f = fopen($filename, 'w+');
        fwrite($f, 'foo');
        fclose($f);

        $res = fopen('php://temp', 'r+');
        $t = new Transfer($s3, $dir, 's3://foo/bar', [
            'debug' => $res,
            'add_content_md5' => true
        ]);

        $t->transfer();
        rewind($res);
        $output = stream_get_contents($res);
        $normalizedFilename = str_replace('\\', '/', $filename);
        $this->assertStringContainsString("Transferring $normalizedFilename -> s3://foo/bar/foo.txt", $output);
        $this->deleteDirectory($dir);
    }

    #[DataProvider('flexibleChecksumsProvider')]
    public function testAddsFlexibleChecksums($checksumAlgorithm)
    {
        if ($checksumAlgorithm === 'crc32c'
            && !extension_loaded('awscrt')
        ) {
            $this->markTestSkipped();
        }

        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [
            new Result(['UploadId' => '123']),
            new Result(['ETag' => 'a']),
            new Result(['ETag' => 'b']),
            new Result(['UploadId' => '123']),
        ]);

        $s3->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd, RequestInterface $req) use ($checksumAlgorithm) {
                $name = $cmd->getName();
                if ($name === 'UploadPart') {
                    $headerName = 'x-amz-checksum-' . $checksumAlgorithm;
                    $this->assertTrue($req->hasHeader($headerName));
                }
            }
        ));

        $dir = sys_get_temp_dir() . '/unittest';
        $this->deleteDirectory($dir);
        mkdir($dir);
        $filename = $dir . '/large.txt';
        $f = fopen($filename, 'w+');
        $line = str_repeat('.', 1024);
        for ($i = 0; $i < 6000; $i++) {
            fwrite($f, $line);
        }
        fclose($f);

        $before = function ($cmd, $req = null) use ($checksumAlgorithm) {
            if ($cmd->getName() === 'UploadPart') {
                $cmd['ChecksumAlgorithm'] = $checksumAlgorithm;
            }
        };
        $res = fopen('php://temp', 'r+');
        $t = new Transfer($s3, $dir, 's3://foo/bar', [
            'mup_threshold' => 5248000,
            'debug' => $res,
            'before' => $before
        ]);

        $t->transfer();
        rewind($res);
        $output = stream_get_contents($res);
        $normalizedFilename = str_replace('\\', '/', $filename);
        $this->assertStringContainsString("Transferring $normalizedFilename -> s3://foo/bar/large.txt (UploadPart) : Part=1", $output);
        $this->deleteDirectory($dir);
    }

    public static function flexibleChecksumsProvider(): array
    {
        return [
            ['sha256'],
            ['sha1'],
            ['crc32c'],
            ['crc32']
        ];
    }

    private function mockResult(callable $fn)
    {
        return function (callable $handler) use ($fn) {
            return function (
                CommandInterface $command,
                ?RequestInterface $request = null
            ) use ($handler, $fn) {
                return Promise\Create::promiseFor($fn($command, $request));
            };
        };
    }

    /** @return S3Client|\PHPUnit_Framework_MockObject_MockObject */
    private function getMockS3Client()
    {
        $mockClient =  $this->getMockBuilder(S3Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $mockHandler = $this->getMockBuilder(HandlerList::class)
            ->disableOriginalConstructor()
            ->getMock();
        $mockClient->method('getHandlerList')
            ->willReturn($mockHandler);

        return $mockClient;
    }
}
