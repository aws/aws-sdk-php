<?php

namespace Aws\Tests\CodeCommit\Integration;

use Aws\CodeCommit\CodeCommitClient;
use Aws\Common\Exception\ServiceResponseException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var CodeCommitClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('CodeCommit');
    }

    public function testListOperation()
    {
        $result = $this->client->listRepositories();
        $this->assertArrayHasKey('repositories', $result->toArray());
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->listBranches(array('repositoryName' => 'fake-repo'));
            $this->fail('An exception should have been thrown.');
        } catch (ServiceResponseException $e) {
            $this->assertEquals('RepositoryDoesNotExistException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
