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

    /**
     * @expectedException \Aws\AwsException
     * @expectedExceptionMessage GetObject does not support the SourceFile parameter
     */
    public function testEnsuresBodyParamExistsToo()
    {
        $this->getTestClient('s3')->getObject([
            'Bucket'     => 'foo',
            'Key'        => 'bar',
            'SourceFile' => __FILE__
        ]);
    }

    /**
     * @expectedException \Aws\AwsException
     * @expectedExceptionMessage Invalid source parameter
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
