<?php

namespace Aws\Tests\CodeCommit;

use Aws\CodeCommit\CodeCommitClient;

class CodeCommitClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\CodeCommit\CodeCommitClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = CodeCommitClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://codecommit.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
