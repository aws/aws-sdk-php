<?php
namespace Aws\Test\LookoutMetrics;

use Aws\Exception\CouldNotCreateChecksumException;
use Aws\Glacier\GlacierClient;
use Aws\LookoutMetrics\LookoutMetricsClient;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\LookoutMetrics\LookoutMetricsClient
 */
class LookoutMetricsClientTest extends TestCase
{
    use UsesServiceTrait;

    public function testUpdatesContentTypeWithBody()
    {
        $client = new LookoutMetricsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $command = $client->getCommand('ListAnomalyDetectors', [
            'MaxResults' => 1
        ]);
        $request = \Aws\serialize($command);

        // Corrected the header in a post request
        $contentType = $request->getHeader('Content-Type');
        $this->assertNotEmpty($contentType);
        $this->assertSame('application/x-amz-json-1.1', $contentType[0]);
    }

    public function testNoContentTypeWithoutBody()
    {
        $client = new LookoutMetricsClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $command = $client->getCommand('ListAnomalyDetectors');
        $request = \Aws\serialize($command);

        // Corrected the header in a post request
        $contentType = $request->getHeader('Content-Type');
        $this->assertEmpty($contentType);
    }
}
