<?php
namespace Aws\Tests\S3;

use Aws\S3\SSECMiddleware;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Response;

/**
 * @covers Aws\S3\SSECSubscriber
 */
class SseCpkListenerTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider getListenerTestCases
     */
    public function testSseCpkListener($operation, array $params, array $expectedResults)
    {
        $command = new Command($operation, $params);
        $transaction = new CommandTransaction(
            $this->getTestClient('s3'),
            $command
        );
        $event = new InitEvent($transaction);
        $listener = new SSECSubscriber();
        $listener->onInit($event);
        foreach ($expectedResults as $key => $value) {
            $this->assertEquals($value, $expectedResults[$key]);
        }
    }

    public function getListenerTestCases()
    {
        return array(
            array(
                'CopyObject',
                array(
                    'SSECustomerKey' => 'foo',
                    'CopySourceSSECustomerKey' => 'bar',
                ),
                array(
                    'SSECustomerAlgorithm' => null,
                    'SSECustomerKey' => base64_encode('foo'),
                    'SSECustomerKeyMD5' => base64_encode(md5('foo', true)),
                    'CopySourceSSECustomerKey' => base64_encode('bar'),
                    'CopySourceSSECustomerKeyMD5' => base64_encode(md5('bar', true)),
                )
            ),
            array(
                'PutObject',
                array(
                    'SSECustomerKey' => 'foo',
                    'SSECustomerKeyMD5' => 'bar',
                ),
                array(
                    'SSECustomerKey' => base64_encode('foo'),
                    'SSECustomerKeyMD5' => base64_encode('bar'),
                )
            ),
            array(
                'ListObjects',
                array(),
                array(
                    'SSECustomerKey' => null,
                    'SSECustomerKeyMD5' => null,
                )
            ),
        );
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testCannotUseWithoutHttps()
    {
        $client = $this->getTestClient('s3', ['scheme' => 'http']);
        $client->listBuckets([
            'SSECustomerKey' => 'foo',
            'CopySourceSSECustomerKey' => 'bar',
        ]);
    }

    public function testCanUseWithoutHttpsForNonSse()
    {
        $client = $this->getTestClient('s3', ['scheme' => 'http']);
        $client->getHttpClient()->getEmitter()->attach(new Mock([new Response(200)]));
        $client->listBuckets();
    }
}
