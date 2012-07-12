<?php

namespace Aws\Tests\S3\Command;

/**
 * @covers Aws\S3\Command\DeleteMultipleObjects
 */
class DeleteMultipleObjectsTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCommand()
    {
        return $this->getServiceBuilder()->get('s3')->getCommand('DeleteMultipleObjects', array(
            'bucket'   => 'foo'
        ));
    }

    public function testAllowsCustomBody()
    {
        $request = $this->getCommand()->set('body', 'foo')->prepare();
        $this->assertEquals('foo', (string) $request->getBody());
        $this->assertNotEmpty($request->getHeader('Content-MD5'));
    }

    public function testAllowsMfaToBeSet()
    {
        $request = $this->getCommand()->setMfa('foo', '123')->prepare();
        $this->assertEquals('foo 123', (string) $request->getHeader('x-amz-mfa'));
    }

    public function testAllowsBodyToBeBuildUsingObjects()
    {
        $command = $this->getCommand();
        $command['Quiet'] = true;
        $command->addObject('foo')->addObject('bar', 123);
        $this->assertEquals(array(
            array('Key' => 'foo', 'VersionId' => null),
            array('Key' => 'bar', 'VersionId' => 123)
        ), $command['objects']);
        $request = $command->prepare();

        $this->assertEquals(
            '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
            . '<Delete><Quiet>true</Quiet><Object><Key>foo</Key></Object><Object><Key>bar</Key>'
            . '<VersionId>123</VersionId></Object></Delete>',
            (string) $request->getBody()
        );
    }
}
