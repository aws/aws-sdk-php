<?php
namespace Aws\Test;

use Aws\MockHandler;
use Aws\Session;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;

class SessionTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsDefaultArgsForNullNamespace()
    {
        $session = new Session([
            'region' => 'us-west-2',
            'version' => 'latest',
        ]);

        $this->assertSame('us-west-2', $session->getArgs()['region']);
        $this->assertSame('latest', $session->getArgs()['version']);
    }

    public function testReturnsDefaultArgsForUnknownNamespace()
    {
        $session = new Session([
            'region' => 'us-west-2',
            'version' => 'latest',
        ]);

        $this->assertSame('us-west-2', $session->getArgs('PHPUnit')['region']);
        $this->assertSame('latest', $session->getArgs('PHPUnit')['version']);
    }

    public function testAllowsOverridesByNamespace()
    {
        $session = new Session([
            'region' => 'us-west-2',
            'version' => 'latest',
            'Route53' => [
                'region' => 'us-east-1',
            ],
        ]);

        $this->assertSame('us-east-1', $session->getArgs('Route53')['region']);
        $this->assertSame('latest', $session->getArgs('Route53')['version']);
    }

    public function testAlwaysReturnsTheSameHttpHandler()
    {
        $session = new Session();
        $this->assertSame(
            $session->getArgs('S3')['http_handler'],
            $session->getArgs('Route53')['http_handler']
        );
    }

    public function testDoesNotInjectHttpHandlerWhenHandlerPresent()
    {
        $session = new Session(['handler' => new MockHandler]);
        $this->assertArrayNotHasKey('http_handler', $session->getArgs());
    }

    public function testDoesNotOverrideHttpHandler()
    {
        $mockHandler = function () {return new FulfilledPromise(new Response);};
        $session = new Session(['http_handler' => $mockHandler]);
        $this->assertSame($mockHandler, $session->getArgs()['http_handler']);
    }

    public function testPermitsPerClientHttpHandlerOverriding()
    {
        $mockHandler = function () { return new FulfilledPromise(new Response); };
        $session = new Session([
            'S3' => [
                'http_handler' => $mockHandler,
            ],
        ]);

        $this->assertNotSame($mockHandler, $session->getArgs()['http_handler']);
        $this->assertSame($mockHandler, $session->getArgs('S3')['http_handler']);
        $this->assertSame(
            $session->getArgs('CloudFront')['http_handler'],
            $session->getArgs('Route53')['http_handler']
        );
    }
}
