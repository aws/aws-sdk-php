<?php

namespace Aws\Tests\CodePipeline;

use Aws\CodePipeline\CodePipelineClient;

class CodePipelineClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\CodePipeline\CodePipelineClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = CodePipelineClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://codepipeline.us-east-1.amazonaws.com', $client->getBaseUrl());
    }
}
