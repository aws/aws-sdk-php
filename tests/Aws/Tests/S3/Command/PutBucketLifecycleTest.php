<?php

namespace Aws\Tests\S3\Command;

/**
 * @covers Aws\S3\Command\PutBucketLifecycle
 */
class PutBucketLifecycleTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCommand()
    {
        return $this->getServiceBuilder()->get('s3')->getCommand('PutBucketLifecycle', array(
            'bucket'   => 'foo'
        ));
    }

    public function testAllowsCustomBody()
    {
        $request = $this->getCommand()->set('body', 'foo')->prepare();
        $this->assertEquals('foo', (string) $request->getBody());
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage Status must be one of Enabled or Disabled
     */
    public function testValidatesStatus()
    {
        $this->getCommand()->addRule('foo', 'baz', 2);
    }

    public function testBuildsBodyUsingRules()
    {
        $xml = (string) $this->getCommand()
            ->addRule('foo', true, 1)
            ->addRule('bar', false, 2, '123')
            ->prepare()
            ->getBody();

        // Ensure we generated valid XML
        $element = new \SimpleXMLElement($xml);

        $this->assertEquals(
            '<LifecycleConfiguration><Rule><Prefix>foo</Prefix><Status>Enabled</Status><Expiration><Days>1</Days>'
            . '</Expiration></Rule><Rule><Prefix>bar</Prefix><Status>Disabled</Status><Expiration><Days>2</Days>'
            . '</Expiration><ID>123</ID></Rule></LifecycleConfiguration>',
            $xml
        );
    }
}
