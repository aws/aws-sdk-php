<?php
namespace Aws\Test\S3;

use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\S3\PermanentRedirectMiddleware
 */
class PermanentRedirectMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    public function testThrowsSpecificException()
    {
        $this->expectExceptionMessage("Encountered a permanent redirect while requesting");
        $this->expectException(\Aws\S3\Exception\PermanentRedirectException::class);
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [['@metadata' => ['statusCode' => 301]]]);
        $s3->getObject(['Bucket' => 'test', 'Key' => 'key']);
    }

    /** @doesNotPerformAssertions */
    public function testPassesThroughUntouched()
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [['@metadata' => ['statusCode' => 200]]]);
        $s3->getObject(['Bucket' => 'test', 'Key' => 'key']);
    }
}
