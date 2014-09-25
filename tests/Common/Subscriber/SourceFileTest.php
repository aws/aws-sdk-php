<?php
namespace Aws\TestCommon\Subscriber;

use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Subscriber\History;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;

/**
 * @covers Aws\Common\Subscriber\SourceFile
 */
class SourceFileTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testAddsUploadBody()
    {
        $history = new History();
        $client = $this->getTestClient('s3');
        $httpClient = $client->getHttpClient();
        $httpClient->getEmitter()->attach(new Mock([new Response(200)]));
        $httpClient->getEmitter()->attach($history);

        $client->putObject([
            'Bucket'     => 'foo',
            'Key'        => 'bar',
            'SourceFile' => __FILE__
        ]);

        $this->assertEquals(
            file_get_contents(__FILE__),
            (string) $history->getLastRequest()->getBody()
        );
    }

    public function testDoesNotModifyExistingBody()
    {
        $history = new History();
        $client = $this->getTestClient('s3');
        $httpClient = $client->getHttpClient();
        $httpClient->getEmitter()->attach(new Mock([new Response(200)]));
        $httpClient->getEmitter()->attach($history);

        $client->putObject([
            'Bucket' => 'foo',
            'Key'    => 'bar',
            'Body'   => 'foo'
        ]);

        $this->assertEquals(
            'foo',
            (string) $history->getLastRequest()->getBody()
        );
    }

    public function testEnsuresBodyParamExists()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [[]]);
        $command = $client->getObject([
            'Bucket'     => 'foo',
            'Key'        => 'bar',
            'SourceFile' => __FILE__
        ]);
        $this->assertNull($command['Body']);
    }

    /**
     * @expectedException \Aws\Common\Exception\AwsException
     * @expectedExceptionMessage Unable to open /tmp/foo/baz/bar/_doesNotExist.txt using mode r
     */
    public function testEnsuresSourceParamExists()
    {
        $this->getTestClient('s3')->putObject([
            'Bucket'     => 'foo',
            'Key'        => 'bar',
            'SourceFile' => '/tmp/foo/baz/bar/_doesNotExist.txt'
        ]);
    }
}
