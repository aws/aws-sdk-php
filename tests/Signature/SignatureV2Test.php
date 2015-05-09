<?php
namespace Aws\Test\Signature;

require_once __DIR__ . '/sig_hack.php';

use Aws\Credentials\Credentials;
use Aws\Signature\SignatureV2;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;

/**
 * @covers Aws\Signature\SignatureV2
 */
class SignatureV2Test extends \PHPUnit_Framework_TestCase
{
    const DEFAULT_KEY = 'AKIDEXAMPLE';
    const DEFAULT_SECRET = 'wJalrXUtnFEMI/K7MDENG+bPxRfiCYEXAMPLEKEY';

    public function testSignsRequestsWithSecurityToken()
    {
        $_SERVER['aws_time'] = 'Fri, 09 Sep 2011 23:36:00 GMT';
        $request = new Request(
            'POST',
            'http://foo.com',
            ['Content-Type' => 'application/x-www-form-urlencoded'],
            'Test=123&Other=456'
        );
        $c = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET, 'foo');
        $sig = new SignatureV2();
        $result = $sig->signRequest($request, $c);

        $expected = "POST / HTTP/1.1\r\n"
            . "Host: foo.com\r\n"
            . "Content-Type: application/x-www-form-urlencoded\r\n\r\n"
            . "Test=123&Other=456&Timestamp=Fri%2C+09+Sep+2011+23%3A36%3A00+GMT&SignatureVersion=2&SignatureMethod=HmacSHA256&AWSAccessKeyId=AKIDEXAMPLE&SecurityToken=foo&Signature=NzQ9b5Kx6qlKj2UIK6QHIrmq5ypogh9PhBHVXKA4RU4%3D";
        $this->assertEquals($expected, Psr7\str($result));
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testThrowsWhenNotImplemented()
    {
        $mock = $sig = new SignatureV2();
        $request = new Request('GET', 'http://foo.com');
        $credentials = new Credentials('foo', 'bar');
        $mock->presign($request, $credentials, '+10 minutes');
    }
}
