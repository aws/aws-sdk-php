<?php
namespace Aws\Test\Api;

use Aws\Api\ApiProvider;
use Aws\Api\Parser\Crc32ValidatingParser;
use Aws\Api\Parser\JsonRpcParser;
use Aws\Api\Service;
use Aws\Command;
use Aws\Exception\AwsException;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\Parser\Crc32ValidatingParser
 */
class Crc32ValidatingParserTest extends TestCase
{
    private function getWrapped()
    {
        $provider = ApiProvider::defaultProvider();
        $data = $provider('api', 'dynamodb', 'latest');
        $parser = new JsonRpcParser(new Service($data, $provider));
        return new Crc32ValidatingParser($parser);
    }

    public function testSkipsIfNoCrcHeader()
    {
        $wrapped = $this->getWrapped();
        $command = new Command('GetItem');
        $response = new Response(200, [], '{"foo": "bar"}');
        $this->assertInstanceOf('Aws\ResultInterface', $wrapped($command, $response));
    }

    public function testThrowsWhenMismatch()
    {
        $wrapped = $this->getWrapped();
        $command = new Command('GetItem');
        $response = new Response(200, ['x-amz-crc32' => '123'], '{"foo": "bar"}');
        try {
            $wrapped($command, $response);
            $this->fail();
        } catch (AwsException $e) {
            $this->assertContains('crc32 mismatch. Expected 123, found 11124959', $e->getMessage());
            $this->assertTrue($e->isConnectionError());
        }
    }

    public function testNothingWhenValidChecksum()
    {
        $wrapped = $this->getWrapped();
        $command = new Command('GetItem');
        $response = new Response(200, ['x-amz-crc32' => '11124959'], '{"foo": "bar"}');
        $this->assertInstanceOf('Aws\ResultInterface', $wrapped($command, $response));
    }
}
