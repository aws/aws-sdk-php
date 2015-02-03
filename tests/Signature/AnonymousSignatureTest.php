<?php
namespace Aws\Test\Signature;

use Aws\Credentials\Credentials;
use Aws\Signature\AnonymousSignature;
use GuzzleHttp\Message\MessageFactory;

/**
 * @covers Aws\Signature\AnonymousSignature
 */
class AnonymousTest extends \PHPUnit_Framework_TestCase
{
    public function testDoesNotSignsRequests()
    {
        $creds = new Credentials('foo', 'bar', 'baz');
        $signature = new AnonymousSignature();
        $request = (new MessageFactory)->createRequest(
            'PUT',
            'http://s3.amazonaws.com/bucket/key',
            [
                'body'    => 'body',
                'headers' => [
                    'Content-Type'   => 'Baz',
                    'X-Amz-Meta-Boo' => 'bam'
                ]
            ]
        );
        $str = (string)$request;

        $signature->signRequest($request, $creds);
        $this->assertSame($str, (string)$request);

        $this->assertEquals('', $signature->createPresignedUrl(
            $request,
            $creds,
            '+1 minute'
        ));
    }
}
