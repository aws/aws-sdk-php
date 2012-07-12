<?php

namespace Aws\Tests\S3\Command;

/**
 * @covers Aws\S3\Command\PutBucketWebsite
 */
class PutBucketWebsiteTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCommand()
    {
        return $this->getServiceBuilder()->get('s3')->getCommand('PutBucketWebsite', array(
            'bucket'   => 'foo'
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
        $command->set('IndexDocumentSuffix', 'index.html')->set('ErrorDocumentKey', 'error.html');
        $xml = (string) $command->prepare()->getBody();
        $element = new \SimpleXMLElement($xml);
        $this->assertEquals(
            '<WebsiteConfiguration xmlns="http://s3.amazonaws.com/doc/2006-03-01/">'
            . '<IndexDocument><Suffix>index.html</Suffix></IndexDocument>'
            . '<ErrorDocument><Key>error.html</Key></ErrorDocument>'
            . '</WebsiteConfiguration>',
            $xml
        );
    }
}
