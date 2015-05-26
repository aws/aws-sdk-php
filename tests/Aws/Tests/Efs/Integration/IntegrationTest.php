<?php
namespace Aws\Tests\Efs\Integration;

use Aws\Efs\EfsClient;
use Aws\Efs\Exception\EfsException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var EfsClient */
    private $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('Efs', [
            'region' => 'us-west-2'
        ]);
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->deleteMountTarget(array(
                'MountTargetId' => 'test_not_there_1234'
            ));
            $this->fail('An exception should have been thrown.');
        } catch (EfsException $e) {
            // pass
        }
    }
}
