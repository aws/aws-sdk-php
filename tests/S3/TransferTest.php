<?php
namespace Aws\Tests\S3;

use Aws\Result;
use Aws\S3\Transfer;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Event\RequestEvents;

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
        (new Transfer($s3, new \ArrayIterator([]), 's3://foo/bar'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Cannot copy from s3 to s3
     */
    public function testCannotCopyS3ToS3()
    {
        $s3 = $this->getTestClient('s3');
        $s3->getEmitter()->on('prepared', function (PreparedEvent $e) {
            $e->intercept(new Result([]));
        });
        (new Transfer($s3, 's3://baz/bam', 's3://foo/bar'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Cannot copy local file to local file
     */
    public function testCannotCopyLocal()
    {
        $s3 = $this->getTestClient('s3');
        (new Transfer($s3, __DIR__, __DIR__));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage mup_threshold must be >= 5248000
     */
    public function testEnsuresMupSizeIsValid()
    {
        $s3 = $this->getTestClient('s3');
        (new Transfer($s3, __DIR__, 's3://foo/bar', ['mup_threshold' => 10]));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage source must be the path to a directory or an iterator that yields file names
     */
    public function testEnsuresSourceIsValid()
    {
        $s3 = $this->getTestClient('s3');
        (new Transfer($s3, false, 's3://foo/bar'));
    }

    public function testCreatesFileIteratorThatContainsStrings()
    {
        $iter = Transfer::recursiveDirIterator(__DIR__);
        $this->assertInstanceOf('Iterator', $iter);
        $files = iterator_to_array($iter);
        $this->assertContains(__FILE__, $files);
    }

    public function testUsesFileIteratorIfStringIsProvided()
    {
        $s3 = $this->getTestClient('s3');
        $t = new Transfer($s3, __DIR__, 's3://foo/bar');
        $this->assertInstanceOf('Iterator', $this->readAttribute($t, 'source'));
    }

    public function testCanSetCustomOptions()
    {
        $opts = [
            'mup_threshold' => 5248000,
            'base_dir'      => 'foo!',
            'concurrency'   => 12
        ];
        $s3 = $this->getTestClient('s3');
        $t = new Transfer($s3, __DIR__, 's3://foo/bar', $opts);
        foreach ($opts as $k => $v) {
            $this->assertSame($v, $this->readAttribute($t, $k));
        }
    }

    public function testCanSetBeforeOptionForUploadsAndUsedWithDebug()
    {
        $s3 = $this->getTestClient('s3');
        $c = [];
        $t = new Transfer($s3, __DIR__, 's3://foo/bar', [
            'before' => function ($source, $dest, CommandInterface $command) use (&$c) {
                $c[] = func_get_args();
            },
            'debug' => true
        ]);
        $s3->getEmitter()->on('prepared', function (PreparedEvent $e) {
            $e->intercept(new Result([]));
        });
        ob_start();
        $t->transfer();
        $output = ob_get_clean();
        $this->assertNotEmpty($c);

        foreach ($c as $test) {
            $this->assertContains(__DIR__, $test[0]);
            $this->assertContains('s3://foo/bar', $test[1]);
            $this->assertEquals('PutObject', $test[2]->getName());
            $this->assertEquals('foo', $test[2]['Bucket']);
            $this->assertStringStartsWith('bar/', $test[2]['Key']);
            $this->assertContains($test[2]['SourceFile'] . ' -> s3://foo/bar', $output);
        }
    }

    public function testDoesMupUploadsForLargeFiles()
    {
        $s3 = $this->getTestClient('s3');
        $q = [
            ['UploadId' => '123'],
            ['ETag' => 'a'],
            ['ETag' => 'b'],
            ['UploadId' => '123']
        ];

        $s3->getEmitter()->on('prepared', function (PreparedEvent $e) use (&$q) {
            $e->intercept(new Result(array_shift($q)));
        }, RequestEvents::LATE);

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

        unlink($filename);
        rmdir($dir);
    }

    public function testDownloadsObjects()
    {
        $s3 = $this->getTestClient('s3');
        $lso = [
            'IsTruncated' => false,
            'Contents' => [
                ['Key' => 'foo/bar'],
                ['Key' => 'baz/bam'],
            ]
        ];

        $q = [
            $lso,
            $lso,
            ['Body' => 'test'],
            ['Body' => '123']
        ];

        $s3->getEmitter()->on('prepared', function (PreparedEvent $e) use (&$q) {
            $e->intercept(new Result(array_shift($q)));
        });

        $dir = sys_get_temp_dir() . '/unittest';
        !is_dir($dir) and mkdir($dir);
        $res = fopen('php://temp', 'r+');
        $t = new Transfer($s3, 's3://foo/bar', $dir, ['debug' => $res]);
        $t->transfer();
        rewind($res);
        $output = stream_get_contents($res);
        $this->assertContains('s3://foo/bar/foo/bar -> ', $output);
        $this->assertContains('s3://foo/bar/baz/bam -> ', $output);

        rmdir($dir . '/foo');
        rmdir($dir . '/baz');
        rmdir($dir);
    }
}
