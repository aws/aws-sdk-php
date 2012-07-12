<?php

namespace Aws\Tests\S3\Command;

/**
 * @covers Aws\S3\Command\CreateBucket
 */
class CreateBucketTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCommand()
    {
        return $this->getServiceBuilder()->get('s3')->getCommand('CreateBucket', array(
            'bucket'   => 'foo'
        ));
    }

    public function testAllowsCustomBucketConfiguration()
    {
        $command = $this->getCommand();
        $command['body'] = 'foo';
        $request = $command->prepare();
        $this->assertEquals('foo', (string) $request->getBody());
    }

    public function testAllowsSettingJustLocationConstraint()
    {
        $command = $this->getCommand();
        $command['LocationConstraint'] = 'foo';
        $request = $command->prepare();
        $this->assertContains('<LocationConstraint>foo</LocationConstraint>', (string) $request->getBody());
    }

    public function testAllowsNoLocationConstraint()
    {
        $command = $this->getCommand();
        $request = $command->prepare();
        $this->assertNull($request->getBody());
    }
}
