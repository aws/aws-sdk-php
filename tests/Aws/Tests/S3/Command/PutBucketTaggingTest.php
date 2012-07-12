<?php

namespace Aws\Tests\S3\Command;

/**
 * @covers Aws\S3\Command\PutBucketTagging
 */
class PutBucketTaggingTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCommand()
    {
        return $this->getServiceBuilder()->get('s3')->getCommand('PutBucketTagging', array(
            'bucket' => 'foo'
        ));
    }

    public function testAllowsCustomBody()
    {
        $request = $this->getCommand()->set('body', 'foo')->prepare();
        $this->assertEquals('foo', (string) $request->getBody());
    }

    public function testBuildsBodyUsingOtherParameters()
    {
        $command = $this->getCommand();
        $command->addTag('foo', 'bar');
        $command->addTag('Cat', 'Roosevelt');
        $request = $command->prepare();
        $xml = (string) $request->getBody();
        $this->assertEquals(
            '<Tagging><TagSet>'
            . '<Tag><Key>foo</Key><Value>bar</Value></Tag>'
            . '<Tag><Key>Cat</Key><Value>Roosevelt</Value></Tag>'
            . '</TagSet></Tagging>',
            $xml
        );
        // Ensure that we created valid XML
        $element = new \SimpleXMLElement($xml);
        // Ensure a Content-MD5 header was added
        $this->assertNotNull($request->getHeader('Content-MD5'));
    }
}
