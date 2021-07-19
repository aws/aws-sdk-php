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

    public function testUpdatesContentTypeWithBody()
    {
        $client = new FinSpaceDataClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $command = $client->getCommand('GetWorkingLocation', [
            'locationType' => 'INGESTION'
        ]);
        $request = \Aws\serialize($command);

        // Corrected the header in a post request
        $contentType = $request->getHeader('Content-Type');
        $this->assertNotEmpty($contentType);
        $this->assertSame('application/x-amz-json-1.1', $contentType[0]);
    }

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
