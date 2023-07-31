<?php
namespace Aws\Test\LexModelsV2;

use Aws\Exception\CouldNotCreateChecksumException;
use Aws\Glacier\GlacierClient;
use Aws\LexModelsV2\LexModelsV2Client;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\LexModelsV2\LexModelsV2Client
 */
class LexModelsV2ClientTest extends TestCase
{
    use UsesServiceTrait;

    public function testNoContentTypeWithoutBody()
    {
        $client = new LexModelsV2Client([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $command = $client->getCommand('DeleteBot', [
            'botId' => '0123456789'
        ]);
        $request = \Aws\serialize($command);

        // Corrected the header in a post request
        $contentType = $request->getHeader('Content-Type');
        $this->assertEmpty($contentType);
    }
}
