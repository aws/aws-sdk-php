<?php
namespace Aws\Tests\ConfigService\Integration;

use Aws\ConfigService\ConfigServiceClient;
use Aws\ConfigService\Exception\ConfigServiceException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var ConfigServiceClient */
    private $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('config');
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->putConfigurationRecorder(array(
                'ConfigurationRecorder' => array(
                    'name'    => 'foo',
                    'roleARN' => 'does-not-exist'
                )
            ));
            $this->fail('An exception should have been thrown.');
        } catch (ConfigServiceException $e) {
            $this->assertEquals('InvalidRoleException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
