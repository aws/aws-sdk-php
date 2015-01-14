<?php
namespace Aws\Test\Integ;

use Aws\S3Client;
use Aws\S3\ClearBucket;

class S3StreamWrapperTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    private $bucket;

    private static function cleanup(S3Client $client, $bucket)
    {
        if ($client->doesBucketExist($bucket)) {
            self::log($bucket . ' exists... Deleting');
            $client = self::getSdk()->getS3();
            $clear = new ClearBucket($client, $bucket);
            $clear->clear();
            try {
                $client->deleteBucket(array('Bucket' => $bucket));
            } catch (\Exception $e) {}
            self::log($bucket . ' deleted');
            return true;
        }

        return false;
    }

    public static function setUpBeforeClass()
    {
        $bucket = self::getResourcePrefix() . 'stream';
        $client = self::getSdk()->getS3();
        $client->registerStreamWrapper();
        if (self::cleanup($client, $bucket)) {
            $client->waitUntil('BucketNotExists', ['Bucket' => $bucket]);
        }
        self::log('Creating bucket ' . $bucket);
        mkdir('s3://' . $bucket);
        $client->waitUntil('BucketExists', ['Bucket' => $bucket]);
    }

    public static function tearDownAfterClass()
    {
        $bucket = self::getResourcePrefix() . 'stream';
        $client = self::getSdk()->getS3();
        self::cleanup($client, $bucket);
    }

    public function setUp()
    {
        $this->bucket = $this->getResourcePrefix() . 'stream';
        $client = self::getSdk()->getS3();
        $client->waitUntil('BucketExists', ['Bucket' => $this->bucket]);
    }

    public function testMkdirs()
    {
        $path = 's3://' . $this->bucket . '/subdir';
        $this->assertTrue(mkdir($path));
        sleep(1);
        $this->assertTrue(is_dir($path));
        unlink($path);
    }

    /**
     * @depends testMkdirs
     */
    public function testChecksIfThingsExist()
    {
        $this->assertTrue(is_dir('s3://' . $this->bucket . '/'));
        $this->assertFalse(is_dir('s3://wefwefwe' . $this->bucket));
        $this->assertFalse(is_file('s3://wefwefwe' . $this->bucket . '/wefweewegr'));
    }

    /**
     * @depends testChecksIfThingsExist
     */
    public function testUploadsFile()
    {
        self::log('Uploading a simple file');
        $path = $this->getKey('simple');
        file_put_contents($path, 'testing!');
        $this->assertEquals('testing!', file_get_contents($path));

        return $path;
    }

    /**
     * @depends testUploadsFile
     */
    public function testDoesFileExist($path)
    {
        $this->assertTrue(file_exists($path));
        $this->assertTrue(is_file($path));

        return $path;
    }

    /**
     * @depends testDoesFileExist
     */
    public function testDeletesFiles($path)
    {
        unlink($path);
        sleep(1);
        $this->assertFalse(file_exists($path));
    }

    /**
     * @depends testDeletesFiles
     */
    public function testOpensStreams()
    {
        $path = $this->getKey('stream');
        file_put_contents($path, 'testing');
        $client = self::getSdk()->getS3();
        $client->waitUntil('ObjectExists', ['Bucket' => $this->bucket, 'Key' => 'stream']);
        $this->assertEquals('testing', file_get_contents($path));
        $h = fopen($path, 'r');
        $this->assertEquals('te', fread($h, 2));
        $this->assertEquals('sting', fread($h, 1000));
        $stat = fstat($h);
        $this->assertEquals(7, $stat['size']);
        fclose($h);
    }

    /**
     * @depends testOpensStreams
     */
    public function testDoesNotRaiseErrorForMissingFile()
    {
        self::log('Testing invalid file');
        $this->assertFalse(is_file('s3://ewfwefwfeweff/' . uniqid('foo')));
        $this->assertFalse(is_link('s3://ewfwefwfeweff/' . uniqid('foo')));
        try {
            lstat('s3://ewfwefwfeweff/' . uniqid('foo'));
            $this->fail('Did not trigger a warning');
        } catch (\PHPUnit_Framework_Error_Warning $e) {}
    }

    public function testCanListWithEmptyDirs()
    {
        $file = 's3://' . $this->bucket . '/empty/';
        file_put_contents($file, '');
        file_put_contents($file . 'bar', 'hello');
        $this->assertEquals(array('bar'), scandir($file));
    }

    private function getKey($name)
    {
        return 's3://' . $this->bucket . '/' . $name;
    }
}
