<?php
namespace Aws\Tests\Kms\Integration;

use Aws\Kms\KmsClient;
use Aws\Kms\Exception\KmsException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var KmsClient */
    private $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('kms');
    }

    public function testListsKeys()
    {
        $result = $this->client->listKeys(array('MaxResults' => 1));
        $this->assertArrayHasKey('Keys', $result->toArray());
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->disableKey(array('KeyId' => 'blahfoo'));
            $this->fail('An exception should have been thrown.');
        } catch (KmsException $e) {
            $this->assertEquals('NotFoundException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
