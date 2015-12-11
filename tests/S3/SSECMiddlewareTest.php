<?php
namespace Aws\Test\S3;

use Aws\Middleware;
use Aws\Result;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\S3\SSECMiddleware
 */
class SseCpkListenerTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider getListenerTestCases
     */
    public function testSseCpkListener($operation, array $params, array $expectedResults)
    {
        $s3 = $this->getTestClient('s3');
        $this->addMockResults($s3, [[]]);
        $cmd = $s3->getCommand($operation, $params);
        $cmd->getHandlerList()->appendInit(
            Middleware::tap(function ($cmd, $req) use ($expectedResults) {
                foreach ($expectedResults as $key => $value) {
                    $this->assertEquals($value, $cmd[$key]);
                }
            })
        );
        $s3->execute($cmd);
    }

    public function getListenerTestCases()
    {
        return [
            [
                'CopyObject',
                [
                    'Bucket' => 'a',
                    'Key' => 'b',
                    'CopySource' => 'd/e',
                    'SSECustomerKey' => 'foo',
                    'CopySourceSSECustomerKey' => 'bar',
                ],
                [
                    'SSECustomerAlgorithm' => null,
                    'SSECustomerKey' => base64_encode('foo'),
                    'SSECustomerKeyMD5' => base64_encode(md5('foo', true)),
                    'CopySourceSSECustomerKey' => base64_encode('bar'),
                    'CopySourceSSECustomerKeyMD5' => base64_encode(md5('bar', true)),
                ]
            ],
            [
                'PutObject',
                [
                    'Bucket' => 'a',
                    'Key' => 'b',
                    'SSECustomerKey' => 'foo',
                    'SSECustomerKeyMD5' => 'bar',
                ],
                [
                    'SSECustomerKey' => base64_encode('foo'),
                    'SSECustomerKeyMD5' => base64_encode('bar'),
                ]
            ],
            [
                'ListObjects',
                ['Bucket' => 'a'],
                [
                    'SSECustomerKey' => null,
                    'SSECustomerKeyMD5' => null,
                ]
            ],
        ];
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
        $this->addMockResults($client, [new Result()]);
        $client->listBuckets();
    }
}
