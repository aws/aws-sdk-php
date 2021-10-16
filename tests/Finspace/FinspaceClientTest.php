<?php
namespace Aws\Test\Finspace;

use Aws\finspace\finspaceClient;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\finspace\finspaceClient
 */
class FinspaceClientTest extends TestCase
{
    use UsesServiceTrait;


    public function testNoContentTypeWithoutBody()
    {
        $client = new finspaceClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $command = $client->getCommand('listEnvironments', []);
        $request = \Aws\serialize($command);

        // Corrected the header in a post request
        $contentType = $request->getHeader('Content-Type');
        $this->assertEmpty($contentType);
    }
}
