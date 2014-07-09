<?php

namespace Aws\Tests\CognitoSync\Integration;

use Aws\CognitoSync\CognitoSyncClient;
use Aws\Common\Exception\ServiceResponseException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var CognitoSyncClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('cognitosync');
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->deleteDataset(array(
                'IdentityPoolId' => 'abc:abc',
                'IdentityId'     => 'foo',
                'DatasetName'    => 'bar',
            ));
            $this->fail('An exception should have been thrown.');
        } catch (ServiceResponseException $e) {
            $this->assertEquals('ResourceNotFoundException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
