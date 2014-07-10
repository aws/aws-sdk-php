<?php

namespace Aws\Tests\CognitoIdentity\Integration;

use Aws\CognitoIdentity\CognitoIdentityClient;
use Aws\Common\Exception\ServiceResponseException;
use Guzzle\Common\Event;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var CognitoIdentityClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('cognito-identity');
    }

    public function testHasAliasName()
    {
        $this->assertSame(
            get_class($this->getServiceBuilder()->get('cognito-identity')),
            get_class($this->getServiceBuilder()->get('cognitoidentity'))
        );
    }

    public function testListIdentityPools()
    {
        $result = $this->client->listIdentityPools(array(
            'MaxResults' => 1,
        ));
        $this->assertArrayHasKey('IdentityPools', $result->toArray());
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->deleteIdentityPool(array('IdentityPoolId' => 'abc:abc'));
            $this->fail('An exception should have been thrown.');
        } catch (ServiceResponseException $e) {
            $this->assertEquals('ResourceNotFoundException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
