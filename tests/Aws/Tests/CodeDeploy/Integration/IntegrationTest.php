<?php

namespace Aws\Tests\CodeDeploy\Integration;

use Aws\CodeDeploy\CodeDeployClient;
use Aws\Common\Exception\ServiceResponseException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var CodeDeployClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('CodeDeploy');
    }

    public function testListApplications()
    {
        $result = $this->client->listApplications();
        $this->assertArrayHasKey('applications', $result->toArray());
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->deleteApplication(array('applicationName' => 'abc:abc'));
            $this->fail('An exception should have been thrown.');
        } catch (ServiceResponseException $e) {
            $this->assertEquals('InvalidApplicationNameException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
