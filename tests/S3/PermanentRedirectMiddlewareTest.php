<?php
namespace Aws\Test\S3;

use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3\PermanentRedirectMiddleware
 */
class PermanentRedirectTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \Aws\S3\Exception\PermanentRedirectException
     * @expectedExceptionMessage Encountered a permanent redirect while requesting
     */
    public function testThrowsSpecificException()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [['@metadata' => ['statusCode' => 301]]]);
        $s3->getObject(['Bucket' => 'test', 'Key' => 'key']);
    }

    public function testPassesThroughUntouched()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [['@metadata' => ['statusCode' => 200]]]);
        $s3->getObject(['Bucket' => 'test', 'Key' => 'key']);
    }
}
