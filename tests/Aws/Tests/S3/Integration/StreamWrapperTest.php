<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\S3\Integration;

/**
 * @group integration
 */
class StreamWrapperTest extends \Aws\Tests\IntegrationTestCase
{
    private $bucket;

    private static function cleanup($client, $bucket)
    {
        if ($client->doesBucketExist($bucket)) {
            self::log($bucket . ' exists... Deleting');
            $client->clearBucket($bucket);
            $client->deleteBucket(array('Bucket' => $bucket));
            self::log($bucket . ' deleted');
            return true;
        }

        return false;
    }

    public static function setUpBeforeClass()
    {
        $bucket = self::getResourcePrefix() . 'stream';
        $client = self::getServiceBuilder()->get('s3', true);
        $client->registerStreamWrapper();
        if (self::cleanup($client, $bucket)) {
            sleep(10);
        }
        self::log('Creating bucket ' . $bucket);
        mkdir('s3://' . $bucket);
        sleep(3);
    }

    public static function tearDownAfterClass()
    {
        $bucket = self::getResourcePrefix() . 'stream';
        $client = self::getServiceBuilder()->get('s3', true);
        self::cleanup($client, $bucket);
    }

    public function setUp()
    {
        $this->bucket = $this->getResourcePrefix() . 'stream';
        $client = self::getServiceBuilder()->get('s3');
        $client->waitUntilBucketExists(array('Bucket' => $this->bucket));
    }

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
     * @depends testDoesFileExist
     */
    public function testOpensStreams()
    {
        self::log('Testing streaming');
        $path = $this->getKey('stream');
        file_put_contents($path, 'testing');
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
    public function testUploadsDir()
    {
        self::log('Uploading test directory under a prefix');
        $client = self::getServiceBuilder()->get('s3', true);
        $client->uploadDirectory(dirname(__DIR__), $this->bucket, 'foo', array('debug' => true));
        sleep(5);
        $path = 's3://' . $this->bucket;
        $this->assertContains('foo', scandir($path));

        return $path . '/foo';
    }

    /**
     * @depends testUploadsDir
     */
    public function testNoTrailingSlashes($path)
    {
        $results = scandir($path);
        $this->assertNotEmpty($results);
        // Ensure trailing slashes are not added
        foreach ($results as $f) {
            $this->assertNotContains('/', $f);
        }
    }

    /**
     * Ensures that the list of files returned from S3 is equal to the local list of files
     *
     * @depends testUploadsDir
     */
    public function testCanRecursivelyListFiles($path)
    {
        $testFiles = $this->getTestFiles(dirname(__DIR__));
        sort($testFiles);
        $s3Files = $this->getS3Files('foo');
        sort($s3Files);
        $this->assertEquals(array_values($testFiles), array_values($s3Files));
    }

    /**
     * @depends testCanRecursivelyListFiles
     */
    public function testCanDownloadByPrefix()
    {
        self::log('Downloading test directory under a prefix');
        $client = self::getServiceBuilder()->get('s3', true);
        $client->downloadBucket('/tmp/swtest', $this->bucket, 'foo', array('debug' => true));
        $expected = $this->getTestFiles(dirname(__DIR__));
        foreach ($testFiles = $this->getTestFiles('/tmp/swtest') as $i => $file) {
            $this->assertStringStartsWith('/foo/', $file);
            $this->assertContains($expected[$i], $file);
            unlink('/tmp/swtest' . $file);
        }
    }

    private function getS3Files($prefix)
    {
        $path = 's3://' . $this->bucket;
        if ($prefix) {
            $path .= '/' . $prefix;
        }

        return array_values(array_map(function ($f) use ($path) {
            return str_replace($path, '', $f);
        }, iterator_to_array(
            new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator(
                    $path,
                    \RecursiveDirectoryIterator::SKIP_DOTS
                )
            )
        )));
    }

    private function getTestFiles($dir)
    {
        return array_values(array_map(function ($f) use ($dir) {
            return str_replace($dir, '', $f);
        }, iterator_to_array(
            new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator(
                    $dir,
                    \RecursiveDirectoryIterator::SKIP_DOTS
                )
            )
        )));
    }

    private function getKey($name)
    {
        return 's3://' . $this->bucket . '/' . $name;
    }
}
