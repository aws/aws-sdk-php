<?php
namespace Aws\Test\Signature;

use Aws\Credentials\Credentials;
use Aws\Signature\AnonymousSignature;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Signature\AnonymousSignature
 */
class AnonymousTest extends TestCase
{
    public function testDoesNotSignsRequests()
    {
        $creds = new Credentials('foo', 'bar', 'baz');
        $signature = new AnonymousSignature();
        $request = new Request(
            'PUT',
            'http://s3.amazonaws.com/bucket/key',
            [
                'Content-Type'   => 'Baz',
                'X-Amz-Meta-Boo' => 'bam'
            ],
            'body'
        );

        $result = $signature->signRequest($request, $creds);
        $this->assertSame($request, $result);

        $this->assertEquals($request, $signature->presign(
            $request,
            $creds,
            '+1 minute'
        ));
    }
}
