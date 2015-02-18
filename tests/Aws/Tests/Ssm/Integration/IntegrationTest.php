<?php
namespace Aws\Tests\Ssm\Integration;

use Aws\Ssm\SsmClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var SsmClient */
    private $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('ssm');
    }

    /**
     * @expectedException \Aws\Ssm\Exception\SsmException
     * @exceptedExceptionMessage Unrecognized field
     */
    public function testParsesErrors()
    {
        $this->client->createDocument(array(
            'Name'    => 'document',
            'Content' => '{"foo":"bar"}',
        ));
    }
}
