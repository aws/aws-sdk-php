<?php
namespace Aws\Tests\CloudHsm\Integration;

use Aws\CloudHsm\CloudHsmClient;

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

    /**
     * @expectedException \Aws\CloudHsm\Exception\CloudHsmException
     */
    public function testParsesErrors()
    {
        $this->client->deleteHsm(array('HsmArn' => 'foo!'));
    }
}
