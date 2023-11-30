<?php
namespace Aws\Test\Signature;

use Aws\Credentials\Credentials;
use Aws\Signature\S3ExpressSignature;
use Aws\Signature\S3SignatureV4;
use GuzzleHttp\Psr7\Request;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

require_once __DIR__ . '/sig_hack.php';

/**
 * @covers Aws\Signature\S3ExpressSignature
 */
class S3ExpressSignatureTest extends TestCase
{
    private function getFixtures()
    {
        $request = new Request('GET', 'http://foo.com');
        $credentials = new Credentials('foo', 'bar', 'baz');
        $signature = new S3ExpressSignature('service', 'region');
        return [$request, $credentials, $signature];
    }

    public function testRemovesTokenHeader()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $request = $request->withHeader('x-amz-security-token', 'baz');
        $result = $signature->signRequest($request, $credentials);
        $this->assertEmpty(
            $result->getHeaderLine('x-amz-security-token')
        );
    }

    public function testAddsTokenHeader()
    {
        list($request, $credentials, $signature) = $this->getFixtures();
        $result = $signature->signRequest($request, $credentials);
        $this->assertSame(
            'baz',
            $result->getHeaderLine('x-amz-s3session-token')
        );
    }
}
