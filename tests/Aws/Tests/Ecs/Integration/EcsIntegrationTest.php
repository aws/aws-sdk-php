<?php
namespace Aws\Tests\Ecs\Integration;

use Aws\Ecs\EcsClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var EcsClient */
    private $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('ecs');
    }

    /**
     * @expectedException \Aws\Ecs\Exception\EcsException
     * @expectedExceptionMessage Cluster not found
     */
    public function testParsesErrors()
    {
        $this->client->stopTask(array('task' => 'invalid!!'));
    }
}
