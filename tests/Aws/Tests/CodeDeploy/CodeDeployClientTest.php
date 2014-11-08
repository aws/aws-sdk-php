<?php

namespace Aws\Tests\CodeDeploy;

use Aws\CodeDeploy\CodeDeployClient;

class CodeDeployClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\CodeDeploy\CodeDeployClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = CodeDeployClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://codedeploy.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}