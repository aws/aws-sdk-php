<?php
namespace Aws\TestCommon\Subscriber;

use Aws\Common\Credentials\Credentials;
use Aws\Common\Subscriber\Signature;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;

/**
 * @covers Aws\Common\Subscriber\Signature
 */
class SignatureTest extends \PHPUnit_Framework_TestCase
{
    public function testSignsRequests()
    {
        $client = new Client();
        $client->getEmitter()->attach(new Mock([new Response(200)]));
        $creds = new Credentials('foo', 'bar');
        $signer = $this->getMockBuilder('Aws\Common\Signature\SignatureInterface')
            ->setMethods(['signRequest'])
            ->getMockForAbstractClass();
        $subscriber = new Signature($creds, $signer);
        $client->getEmitter()->attach($subscriber);
        $request = $client->createRequest('GET', 'http://foo.com');
        $signer->expects($this->once())
            ->method('signRequest')
            ->with($request, $creds);

        $client->send($request);
    }
}
