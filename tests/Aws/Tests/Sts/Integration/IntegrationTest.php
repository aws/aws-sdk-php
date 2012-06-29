<?php

namespace Aws\Tests\Sts\Integration;

/**
 * @group integration
 */
class IntegrationTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testRetrievesFederatedToken()
    {
        $client = $this->getServiceBuilder()->get('sts');

        $command = $client->getCommand('GetFederationToken', array(
            'DurationSeconds' => 3609,
            'Name'             => 'foo',
            'Policy'           => array(
                'Statement' => array(
                    array(
                        'Effect'   => 'Deny',
                        'Action'   => 's3:GetObject',
                        'Resource' => 'arn:aws:s3:::mybucket/federated/Jill/*'
                    )
                )
            )
        ));

        $command->execute();

        // Ensure the query string variables were set correctly
        $this->assertEquals('foo', $command->getRequest()->getQuery()->get('Name'));
        $this->assertEquals('GetFederationToken', $command->getRequest()->getQuery()->get('Action'));
        $this->assertNotEmpty($command->getRequest()->getQuery()->get('Policy'));
        $this->assertEquals(3609, $command->getRequest()->getQuery()->get('DurationSeconds'));

        // Ensure that the result is a SimpleXMLElement
        $this->assertInstanceOf('SimpleXMLElement', $command->getResult());
    }

    public function testRetrievesSessionTokenWithDefaultDuration()
    {
        $client = $this->getServiceBuilder()->get('sts');
        $command = $client->getCommand('GetSessionToken');
        $this->assertInstanceOf('SimpleXMLElement', $command->execute());
    }

    public function testRetrievesSessionTokenWithCustomDuration()
    {
        $client = $this->getServiceBuilder()->get('sts');
        $command = $client->getCommand('GetSessionToken', array(
            'DurationSeconds' => 5000
        ));

        $this->assertInstanceOf('SimpleXMLElement', $command->execute());
        $this->assertEquals('GetSessionToken', $command->getRequest()->getQuery()->get('Action'));
        $this->assertEquals(5000, $command->getRequest()->getQuery()->get('DurationSeconds'));
    }
}
