<?php

namespace Aws\Test\CloudTrail;

use Aws\CloudTrail\LogFileReader;
use Aws\S3\S3Client;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream;

/**
 * @covers Aws\CloudTrail\LogFileReader
 */
class LogFileReaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataForLogReadingTest
     */
    public function testCorrectlyReadsLogFiles($responseBody, $recordCount)
    {
        $mock = new Mock([new Response(200, [], Stream\create($responseBody))]);
        $s3Client = S3Client::factory([
            'key'    => 'foo',
            'secret' => 'bar',
        ]);
        $s3Client->getHttpClient()->getEmitter()->attach($mock);
        $reader = new LogFileReader($s3Client);
        $records = $reader->read('test-bucket', 'test-key');
        $this->assertCount($recordCount, $records);
    }

    public function dataForLogReadingTest()
    {
        return [
            ['{"Records":[{"foo":"1"},{"bar":"2"},{"baz":"3"}]}', 3],
            ['{"Records":[]}', 0],
            ['', 0],
        ];
    }
}
