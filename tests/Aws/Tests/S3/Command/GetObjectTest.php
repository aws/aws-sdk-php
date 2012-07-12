<?php

namespace Aws\Tests\S3\Command;

/**
 * @covers Aws\S3\Command\GetObject
 */
class GetObjectTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCommand()
    {
        return $this->getServiceBuilder()->get('s3')->getCommand('GetObject', array(
            'bucket'   => 'foo'
        ));
    }

    public function testAllowsBasicRequest()
    {
        $request = $this->getCommand()->set('key', 'this/is!_?/a/path')->prepare();
        $this->assertEquals('/this/is%21_%3F/a/path', $request->getResource());
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('foo.s3.amazonaws.com', $request->getHost());
    }

    public function testAllowsCustomResponseBodyLocation()
    {
        $command = $this->getCommand()->set('key', 'bar')->setDestination(fopen('php://temp', 'w+'));
        $request = $command->prepare();
        $this->assertSame($command['response_body'], $this->readAttribute($request, 'responseBody'));
        $this->assertTrue($request->getEventDispatcher()->hasListeners('request.complete'));
    }

    public function testAllowsCustomResponseBodyFiles()
    {
        $command = $this->getCommand()->set('key', 'bar')->setDestination(tempnam(sys_get_temp_dir(), 'foo'));
        $this->assertInstanceOf('Guzzle\Http\EntityBody', $command['response_body']);
    }

    public function testCanDisableMd5Validation()
    {
        $request = $this->getCommand()->set('key', 'bar')->set('validate_md5', false)->prepare();
        $this->assertFalse($request->getEventDispatcher()->hasListeners('request.complete'));
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage Error setting download destination:
     */
    public function testWrapsGuzzleExceptions()
    {
        $this->getCommand()
            ->set('key', 'bar')
            ->setDestination(true)
            ->prepare();
    }
}
