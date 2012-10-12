<?php

namespace Aws\Tests\S3;

use Aws\S3\AcpHeadersListener;
use Aws\S3\Enum\Group;
use Aws\S3\Model\Acp;
use Aws\S3\Model\AcpBuilder;
use Aws\S3\Model\Grantee;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\S3\AcpHeadersListener
 */
class AcpHeadersListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasEvents()
    {
        $this->assertNotEmpty(AcpHeadersListener::getSubscribedEvents());
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage ACP must be an instance of Aws\S3\Model\Acp
     */
    public function testThrowsExceptionWhenAcpIsInvalid()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $s3->getCommand('PutObject', array(
            'Bucket' => 'test',
            'Key'    => 'key',
            'Body'   => 'hello',
            'ACP'    => new \stdClass()
        ))->prepare();
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage Use either the ACP parameter or the Grants parameter
     */
    public function testThrowsExceptionWhenBothAcpAndGrantsAreSet()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $s3->getCommand('PutObject', array(
            'Bucket' => 'test',
            'Key'    => 'key',
            'Body'   => 'hello',
            'ACP'    => new Acp(new Grantee('123')),
            'Grants' => array()
        ))->prepare();
    }

    public function testIgnoresOperationsWhereAcpIsNotPresent()
    {
        $s3 = $this->getServiceBuilder()->get('s3');
        $s3->getCommand('GetObject', array(
            'Bucket' => 'test',
            'Key'    => 'key',
            'ACP'    => new Acp(new Grantee('123')),
            'Grants' => array()
        ))->prepare();
    }

    public function testAppliesAcpHeadersToCommand()
    {
        $acp = AcpBuilder::newInstance()
            ->setOwner('test')
            ->addGrantForEmail('READ', 'test@example.com')
            ->addGrantForEmail('READ', 'baz@example.com')
            ->addGrantForEmail('WRITE', 'jar@jar.com')
            ->addGrantForGroup('READ_ACP', Group::ALL_USERS)
            ->build();

        $s3 = $this->getServiceBuilder()->get('s3');
        $command = $s3->getCommand('PutObject', array(
            'Bucket' => 'test',
            'Key'    => 'key',
            'Body'   => 'hello',
            'ACP'    => $acp
        ));
        $command->prepare();
        $this->assertEquals('emailAddress="test@example.com", emailAddress="baz@example.com"', $command['GrantRead']);
        $this->assertEquals('emailAddress="jar@jar.com"', $command['GrantWrite']);
        $this->assertEquals('uri="http://acs.amazonaws.com/groups/global/AllUsers"', $command['GrantReadACP']);
    }
}
