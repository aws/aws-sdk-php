<?php

namespace Aws\Tests\Common\Integration;

use Aws\Common\Client\DefaultClient;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Signature\SignatureV4;
use Aws\DynamoDb\DynamoDbClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    public function testGenericClientCanAccessDynamoDb()
    {
        /** @var $dynamodb DynamoDbClient */
        $dynamodb = $this->getServiceBuilder()->get('dynamodb', true);
        $credentials = $dynamodb->getCredentials();
        $dynamodb = new \ReflectionClass('Aws\DynamoDb\DynamoDbClient');
        $description = dirname($dynamodb->getFileName()) . DIRECTORY_SEPARATOR
            . 'Resources' . DIRECTORY_SEPARATOR . 'client.json';

        /** @var $client DefaultClient */
        $client = DefaultClient::factory(array(
            'credentials'         => $credentials,
            'signature'           => new SignatureV4(),
            'service.description' => $description,
            'service'             => 'dynamodb',
            'region'              => 'us-east-1',
        ));

        $command = $client->getCommand('ListTables');
        $command->execute();

        $this->assertEquals(200, $command->getResponse()->getStatusCode());
    }
}
