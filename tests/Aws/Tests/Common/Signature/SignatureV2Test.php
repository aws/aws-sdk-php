<?php

namespace Aws\Tests\Common\Signature;

use Aws\Common\Signature\SignatureV2;
use Aws\Common\Credentials\Credentials;
use Guzzle\Http\Message\RequestFactory;

class SignatureV2Test extends \Guzzle\Tests\GuzzleTestCase
{
    const DEFAULT_KEY = 'AKIDEXAMPLE';
    const DEFAULT_SECRET = 'wJalrXUtnFEMI/K7MDENG+bPxRfiCYEXAMPLEKEY';
    const DEFAULT_DATETIME = 'Fri, 09 Sep 2011 23:36:00 GMT';

    /**
     * @covers Aws\Common\Signature\SignatureV2
     */
    public function testSignsRequests()
    {
        $credentials = new Credentials('foo', 'bar');
        $signature = new SignatureV2();
        $request = RequestFactory::getInstance()->create('GET', 'http://example.com');
        $signature->signRequest($request, $credentials);
    }
}
