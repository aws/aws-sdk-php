<?php
namespace Aws\Test\Glacier;

use Aws\Exception\CouldNotCreateChecksumException;
use Aws\Glacier\GlacierClient;
use Aws\Result;
use Aws\Test\Exception\CouldNotCreateChecksumExceptionTest;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;

/**
 * @covers Aws\Glacier\GlacierClient
 */
class GlacierClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testAddsRequiredParamsAndHeadersAutomatically()
    {
        $client = new GlacierClient([
            'service' => 'glacier',
            'region'  => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function ($req, $opt) use (&$request) {
                $request = $req;
                return new Response(200);
            }
        ]);

        $command = $client->getCommand('UploadArchive', [
            'vaultName' => 'foo',
            'body' => 'foo',
        ]);
        $client->execute($command);

        // Adds default accountId and the API version header.
        $this->assertEquals('-', $command['accountId']);
        $this->assertEquals(
            $client->getApi()->getMetadata('apiVersion'),
            $request->getHeader('x-amz-glacier-version')
        );

        // Added the tree and content hashes.
        $hash = hash('sha256', 'foo');
        $this->assertEquals($hash, $request->getHeader('x-amz-content-sha256'));
        $this->assertEquals($hash, $request->getHeader('x-amz-sha256-tree-hash'));
    }

    public function testErrorWhenHashingNonSeekableStream()
    {
        $this->setExpectedException(CouldNotCreateChecksumException::class);
        $this->getTestClient('Glacier')->uploadArchive([
            'vaultName' => 'foo',
            'body'      => new NoSeekStream(Stream::factory('foo')),
        ]);
    }
}
