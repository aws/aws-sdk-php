<?php

namespace Aws\Tests\S3\Command;

/**
 * @covers Aws\S3\Command\PutBucketVersioning
 */
class PutBucketVersioningTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCommand()
    {
        return $this->getServiceBuilder()->get('s3')->getCommand('PutBucketVersioning', array(
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
        $command['Status'] = 'Enabled';
        $command['MfaDelete'] = 'Enabled';
        $xml = (string) $command->prepare()->getBody();
        $element = new \SimpleXMLElement($xml);
        $this->assertEquals(
            '<VersioningConfiguration xmlns="http://s3.amazonaws.com/doc/2006-03-01/"><Status>Enabled</Status>'
            . '<MfaDelete>Enabled</MfaDelete></VersioningConfiguration>',
            $xml
        );
    }
}
