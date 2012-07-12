<?php

namespace Aws\Tests\S3\Command;

use Aws\S3\Model\Grant;
use Aws\S3\Model\Grantee;
use Aws\S3\Enum\Permission;

/**
 * @covers Aws\S3\Command\PutBucketLogging
 */
class PutBucketLoggingTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCommand()
    {
        return $this->getServiceBuilder()->get('s3')->getCommand('PutBucketLogging', array(
            'bucket'   => 'foo'
        ));
    }

    public function testAllowsCustomBody()
    {
        $request = $this->getCommand()->set('body', 'foo')->prepare();
        $this->assertEquals('foo', (string) $request->getBody());
    }

    public function testBuildsXmlForDisablingLogging()
    {
        $request = $this->getCommand()->prepare();
        $this->assertEquals(
            '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
            . '<BucketLoggingStatus xmlns="http://doc.s3.amazonaws.com/2006-03-01" />',
            (string) $request->getBody()
        );
    }

    public function testBuildsBodyUsingGrants()
    {
        $command = $this->getCommand();
        $grant1 = new Grant(new Grantee('foo@test.com'), Permission::READ_ACP);
        $grant2 = new Grant(new Grantee('bar@test.com'), Permission::READ);
        $command->addGrant($grant1)->addGrant($grant2);
        $command->set('TargetBucket', 'mybucket')->set('TargetPrefix', 'P-');
        $request = $command->prepare();
        $xml = (string) $request->getBody();
        // Ensure we created valid XML
        $element = new \SimpleXMLElement($xml);
        $this->assertEquals(
            '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
            . '<BucketLoggingStatus xmlns="http://doc.s3.amazonaws.com/2006-03-01">'
            . '<TargetBucket>mybucket</TargetBucket><TargetPrefix>P-</TargetPrefix><TargetGrants>'
            . '<Grant><Grantee xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="AmazonCustomerByEmail">'
            . '<EmailAddress>foo@test.com</EmailAddress></Grantee><Permission>READ_ACP</Permission></Grant>'
            . '<Grant><Grantee xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="AmazonCustomerByEmail">'
            . '<EmailAddress>bar@test.com</EmailAddress></Grantee><Permission>READ</Permission></Grant></TargetGrants>'
            . '</BucketLoggingStatus>',
            $xml
        );
    }
}
