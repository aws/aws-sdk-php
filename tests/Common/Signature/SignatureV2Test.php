<?php
namespace Aws\Test\Common\Signature;

require_once __DIR__ . '/sig_hack.php';

use Aws\Common\Credentials\Credentials;
use Aws\Common\Signature\SignatureV2;
use GuzzleHttp\Message\MessageFactory;

/**
 * @covers Aws\Common\Signature\SignatureV2
 */
class SignatureV2Test extends \PHPUnit_Framework_TestCase
{
    const DEFAULT_KEY = 'AKIDEXAMPLE';
    const DEFAULT_SECRET = 'wJalrXUtnFEMI/K7MDENG+bPxRfiCYEXAMPLEKEY';
    const DEFAULT_DATETIME = 'Fri, 09 Sep 2011 23:36:00 GMT';

    public function testSignsRequestsWithSecurityToken()
    {
        $_SERVER['aws_time'] = true;
        $request = (new MessageFactory)->createRequest(
            'POST',
            'http://foo.com',
            [
                'body' => ['Test' => '123', 'Other' => '456']
            ]
        );
        $request->removeHeader('User-Agent');
        $c = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET, 'foo');
        $sig = new SignatureV2();
        $sig->signRequest($request, $c);

        $expected = "POST / HTTP/1.1\r\n"
            . "Host: foo.com\r\n"
            . "Content-Type: application/x-www-form-urlencoded\r\n"
            . "Content-Length: 18\r\n\r\n"
            . "Test=123&Other=456&Timestamp=Fri%2C+09+Sep+2011+23%3A36%3A00+GMT&SignatureVersion=2&SignatureMethod=HmacSHA256&AWSAccessKeyId=AKIDEXAMPLE&SecurityToken=foo&Signature=NzQ9b5Kx6qlKj2UIK6QHIrmq5ypogh9PhBHVXKA4RU4%3D";
        $this->assertEquals($expected, (string) $request);
    }
}
