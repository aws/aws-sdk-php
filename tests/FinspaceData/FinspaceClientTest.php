<?php
namespace Aws\Test\FinspaceData;

use Aws\FinSpaceData\FinSpaceDataClient;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\FinSpaceData\FinspaceDataClient
 */
class FinspaceClientTest extends TestCase
{
    use UsesServiceTrait;

    public function testNoContentTypeWithoutBody()
    {
        $client = new FinSpaceDataClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $command = $client->getCommand('GetWorkingLocation', []);
        $request = \Aws\serialize($command);

        // Corrected the header in a post request
        $contentType = $request->getHeader('Content-Type');
        $this->assertEmpty($contentType);
    }
}
