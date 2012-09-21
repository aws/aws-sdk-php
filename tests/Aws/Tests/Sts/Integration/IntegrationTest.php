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
            'Name'            => 'foo',
            'Policy'          => json_encode(array(
                'Statement' => array(
                    array(
                        'Effect'   => 'Deny',
                        'Action'   => 's3:GetObject',
                        'Resource' => 'arn:aws:s3:::mybucket/federated/Jill/*'
                    )
                )
            ))
        ));

        try {
            $command->execute();
        } catch (\Aws\Sts\Exception\StsException $e) {
            echo $e->getMessage() . "\n";
            echo var_export($e->getResponse()->getRequest()->getParams()->get('aws.signed_headers'), true). "\n";
            echo $e->getResponse()->getRequest()->getParams()->get('aws.canonical_request') . "\n";
            echo $e->getResponse()->getRequest()->getParams()->get('aws.string_to_sign') . "\n";
            die();
        }

        // Ensure the query string variables were set correctly
        $this->assertEquals('foo', $command->getRequest()->getPostField('Name'));
        $this->assertEquals('GetFederationToken', $command->getRequest()->getPostField('Action'));
        $this->assertNotEmpty($command->getRequest()->getPostField('Policy'));
        $this->assertEquals(3609, $command->getRequest()->getPostField('DurationSeconds'));

        // Ensure that the result is an array
        $this->assertInternalType('array', $command->getResult());
        $this->assertArrayHasKey('GetFederationTokenResult', $command->getResult());
        $this->assertArrayHasKey('ResponseMetadata', $command->getResult());
    }

    public function testRetrievesSessionTokenWithDefaultDuration()
    {
        $client = $this->getServiceBuilder()->get('sts');
        $command = $client->getCommand('GetSessionToken');
        $this->assertInternalType('array', $command->execute());
    }

    public function testRetrievesSessionTokenWithCustomDuration()
    {
        $client = $this->getServiceBuilder()->get('sts');
        $command = $client->getCommand('GetSessionToken', array(
            'DurationSeconds' => 5000
        ));

        $this->assertInternalType('array', $command->execute());
        $this->assertEquals('GetSessionToken', $command->getRequest()->getPostField('Action'));
        $this->assertEquals(5000, $command->getRequest()->getPostField('DurationSeconds'));
    }
}
