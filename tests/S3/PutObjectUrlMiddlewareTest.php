<?php
namespace Aws\Test\S3;

use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3\PutObjectUrlMiddleware
 */
class PutObjectUrlMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    public function testAddsObjectUrl()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            ['@metadata' => ['effectiveUri' => 'http://foo.com']]
        ]);
        $result = $client->putObject([
            'Bucket' => 'test',
            'Key'    => 'key',
            'Body'   => 'hi'
        ]);
        $this->assertSame('http://foo.com', $result['ObjectURL']);
    }

    public function testAddsObjectUrlToCompleteMultipartWithoutEffectiveUri()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            [
                'Location' => 'https://test.s3.amazonaws.com/key',
                '@metadata' => []
            ]
        ]);
        $result = $client->completeMultipartUpload([
            'Bucket'   => 'test',
            'Key'      => 'key',
            'UploadId' => '123'
        ]);
        $this->assertSame(
            'https://test.s3.amazonaws.com/key',
            $result['ObjectURL']
        );
    }

    public function testAddsObjectUrlToCompleteMultipartWithEffectiveUri()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            [
                'Location' => 'https://test.s3.amazonaws.com/key',
                '@metadata' => [
                    'effectiveUri' => 'http://foo.com/key?some=query',
                ]
            ]
        ]);
        $result = $client->completeMultipartUpload([
            'Bucket'   => 'test',
            'Key'      => 'key',
            'UploadId' => '123'
        ]);
        $this->assertSame(
            'http://foo.com/key',
            $result['ObjectURL']
        );
    }
}
