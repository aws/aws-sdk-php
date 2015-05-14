<?php
namespace Aws\Tests\DirectoryService\Integration;

use Aws\DirectoryService\DirectoryServiceClient;
use Aws\DirectoryService\Exception\DirectoryServiceException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var DirectoryServiceClient */
    private $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('ds');
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->deleteDirectory(array(
                'DirectoryId' => 'd-1111111111'
            ));
            $this->fail('An exception should have been thrown.');
        } catch (DirectoryServiceException $e) {
            $this->assertEquals('EntityDoesNotExistException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
