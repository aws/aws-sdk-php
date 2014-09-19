<?php
namespace Aws\Test\Common\Signature;

require_once __DIR__ . '/sig_hack.php';

use Aws\Common\Signature\SignatureV3Https;
use Aws\Common\Credentials\Credentials;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\MessageFactory;

/**
 * @covers Aws\Common\Signature\SignatureV3Https
 */
class SignatureV3HttpsTest extends \PHPUnit_Framework_TestCase
{
    const DEFAULT_KEY = 'AKIDEXAMPLE';
    const DEFAULT_SECRET = 'wJalrXUtnFEMI/K7MDENG+bPxRfiCYEXAMPLEKEY';
    const DEFAULT_DATETIME = 'Fri, 09 Sep 2011 23:36:00 GMT';

    public function setup()
    {
        $_SERVER['aws_time'] = true;
    }

    /**
     * @dataProvider testSuiteProvider
     */
    public function testSignsRequestsProperly($request)
    {
        // Create a request based on the request
        $request = (new MessageFactory)->fromMessage($request);
        $request->removeHeader('User-Agent');
        $request->removeHeader('Content-Length');
        $credentials = new Credentials(self::DEFAULT_KEY, self::DEFAULT_SECRET);
        $signature = new SignatureV3Https();
        $signature->signRequest($request, $credentials);
        $expectedHeader = 'AWS3-HTTPS AWSAccessKeyId=AKIDEXAMPLE,Algorithm=HmacSHA256,Signature=2xkne78+c4e7JzUxDAADvn9vECImgCcEaBDkYw3Wk+w=';
        $this->assertEquals(
            $expectedHeader,
            $request->getHeader('x-amzn-authorization')
        );
    }

    public function testSuiteProvider()
    {
        $date = self::DEFAULT_DATETIME;
        return [
            ["GET / HTTP/1.1\r\nHost: example.com\r\n\r\n"],
            ["GET / HTTP/1.1\r\nHost: example.com\r\nDate: {$date}\r\n\r\n"],
            ["GET / HTTP/1.1\r\nHost: example.com\r\nx-amz-date: {$date}\r\n\r\n"],
        ];
    }

    public function testUsesSecurityTokensWhenAvailable()
    {
        $signature = new SignatureV3Https();
        $request = new Request('GET', 'http://www.example.com');

        // Create a credentials object with a token
        $credentials = new Credentials('a', 'b', 'c', time() + 10000);

        $signature->signRequest($request, $credentials);
        $this->assertEquals(
            'c',
            $request->getHeader('x-amz-security-token')
        );
    }
}
