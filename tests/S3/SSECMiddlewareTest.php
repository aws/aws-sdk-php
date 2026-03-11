<?php
namespace Aws\Test\S3;

use Aws\Middleware;
use Aws\Result;
use Aws\S3\SSECMiddleware;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(SSECMiddleware::class)]
class SSECMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    #[DataProvider('getListenerTestCases')]
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

    public static function getListenerTestCases(): array
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

    public function testCannotUseWithoutHttps()
    {
        $this->expectException(\RuntimeException::class);
        $client = $this->getTestClient('s3', ['scheme' => 'http']);
        $client->listBuckets([
            'SSECustomerKey' => 'foo',
            'CopySourceSSECustomerKey' => 'bar',
        ]);
    }

    #[DoesNotPerformAssertions]
    public function testCanUseWithoutHttpsForNonSse()
    {
        $client = $this->getTestClient('s3', ['scheme' => 'http']);
        $this->addMockResults($client, [new Result()]);
        $client->listBuckets();
    }
}
