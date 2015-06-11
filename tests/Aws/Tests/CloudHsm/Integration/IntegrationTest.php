<?php
namespace Aws\Tests\CloudHsm\Integration;

use Aws\CloudHsm\CloudHsmClient;
use Aws\CloudHsm\Exception\CloudHsmException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var CloudHsmClient */
    private $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('cloudhsm');
    }

    public function testSimpleOperation()
    {
        $result = $this->client->listAvailableZones();
        $this->assertArrayHasKey('AZList', $result->toArray());
    }

    public function testParsesErrors()
    {
        $error = null;
        try {
            $this->client->deleteHsm(array('HsmArn' => 'foo!'));
        } catch (CloudHsmException $e) {
            $error = $e->getAwsErrorCode();
        }

        $this->assertEquals('ValidationException', $error);
    }
}
