<?php

namespace Aws\Tests\CloudTrail;

use Aws\CloudTrail\LogFileReader;
use Aws\S3\S3Client;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;

class LogFileReaderTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @dataProvider dataForLogReadingTest
     * @covers Aws\CloudTrail\LogFileReader
     */
    public function testCorrectlyReadsLogFiles($responseBody, $recordCount)
    {
        $s3Client = S3Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
        ));
        $s3Client->addSubscriber(new MockPlugin(array(new Response(200, null, $responseBody))));

        $reader = new LogFileReader($s3Client);
        $records = $reader->read('test-bucket', 'test-key');

        $this->assertCount($recordCount, $records);
    }

    public function dataForLogReadingTest()
    {
        return array(
            array('{"Records":[{"foo":"1"},{"bar":"2"},{"baz":"3"}]}', 3),
            array('{"Records":[]}', 0),
            array('', 0),
        );
    }
}
