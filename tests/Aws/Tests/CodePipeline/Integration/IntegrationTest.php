<?php

namespace Aws\Tests\CodePipeline\Integration;

use Aws\CodePipeline\CodePipelineClient;
use Aws\Common\Exception\ServiceResponseException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var CodePipelineClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('CodePipeline');
    }

    public function testListOperation()
    {
        $result = $this->client->listPipelines();
        $this->assertArrayHasKey('pipelines', $result->toArray());
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->getPipeline(array('name' => 'fake-pipeline'));
            $this->fail('An exception should have been thrown.');
        } catch (ServiceResponseException $e) {
            $this->assertEquals('PipelineNotFoundException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
