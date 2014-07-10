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
        $this->client = $this->getServiceBuilder()->get('cognito-sync');
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->deleteDataset(array(
                'IdentityPoolId' => 'abc:123af',
                'IdentityId'     => 'foo:123af',
                'DatasetName'    => 'bar',
            ));
            $this->fail('An exception should have been thrown.');
        } catch (ServiceResponseException $e) {
            $this->assertEquals('ResourceNotFoundException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
