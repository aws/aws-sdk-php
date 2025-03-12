<?php

namespace Aws\Test\S3\Parser;

use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\ResultInterface;
use Aws\S3\Parser\S3Parser;
use Aws\S3\Parser\S3ResultMutator;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class S3ParserTest extends TestCase
{
    const INTERNAL_S3200_ERROR = <<<EOXML
<?xml version="1.0" encoding="UTF-8"?>

<Error>
 <Code>InternalError</Code>
 <Message>We encountered an internal error. Please try again.</Message>
 <RequestId>656c76696e6727732072657175657374</RequestId>
 <HostId>Uuag1LuByRx9e6j5Onimru9pO4ZVKnJ2Qz7/C1NPcfTWAtRPfTaOFg==</HostId>
</Error>
EOXML;

    /**
     * @dataProvider s3200ErrorHandlingCasesProvider
     * @param string $operation The operation to test.
     *
     * @return void
     */
    public function testHandle200Errors(string $operation)
    {
        $this->expectException(AwsException::class);
        $this->expectExceptionMessage(
            'We encountered an internal error. Please try again.'
        );
        $s3Parser = $this->getS3Parser();
        $command = new Command($operation, [], new HandlerList());
        $response = new Response(
            200,
            [],
            self::INTERNAL_S3200_ERROR
        );
        $s3Parser($command, $response);
    }

    /**
     * Returns a set of s3 operations.
     *
     * @return \Generator
     */
    public function s3200ErrorHandlingCasesProvider(): \Generator
    {
        $operations = [
            'AbortMultipartUpload',
            'CompleteMultipartUpload',
            'CopyObject',
            'CreateBucket',
            'CreateMultipartUpload',
            'CreateSession',
            'DeleteBucket',
            'DeleteBucketAnalyticsConfiguration',
            'DeleteBucketCors',
            'DeleteBucketEncryption',
            'DeleteBucketIntelligentTieringConfiguration',
            'DeleteBucketInventoryConfiguration',
            'DeleteBucketLifecycle',
            'DeleteBucketMetricsConfiguration',
            'DeleteBucketOwnershipControls',
            'DeleteBucketPolicy',
            'DeleteBucketReplication',
            'DeleteBucketTagging',
            'DeleteBucketWebsite',
            'DeleteObject',
            'DeleteObjectTagging',
            'DeleteObjects',
            'DeletePublicAccessBlock',
            'GetBucketAccelerateConfiguration',
            'GetBucketAcl',
            'GetBucketAnalyticsConfiguration',
            'GetBucketCors',
            'GetBucketEncryption',
            'GetBucketIntelligentTieringConfiguration',
            'GetBucketInventoryConfiguration',
            'GetBucketLifecycleConfiguration',
            'GetBucketLocation',
            'GetBucketLogging',
            'GetBucketMetricsConfiguration',
            'GetBucketNotificationConfiguration',
            'GetBucketOwnershipControls',
            'GetBucketPolicy',
            'GetBucketPolicyStatus',
            'GetBucketReplication',
            'GetBucketRequestPayment',
            'GetBucketTagging',
            'GetBucketVersioning',
            'GetBucketWebsite',
            'GetObjectAcl',
            'GetObjectAttributes',
            'GetObjectLegalHold',
            'GetObjectLockConfiguration',
            'GetObjectRetention',
            'GetObjectTagging',
            'GetPublicAccessBlock',
            'HeadBucket',
            'HeadObject',
            'ListBucketAnalyticsConfigurations',
            'ListBucketIntelligentTieringConfigurations',
            'ListBucketInventoryConfigurations',
            'ListBucketMetricsConfigurations',
            'ListBuckets',
            'ListDirectoryBuckets',
            'ListMultipartUploads',
            'ListObjectVersions',
            'ListObjects',
            'ListObjectsV2',
            'ListParts',
            'PutBucketAccelerateConfiguration',
            'PutBucketAcl',
            'PutBucketAnalyticsConfiguration',
            'PutBucketCors',
            'PutBucketEncryption',
            'PutBucketIntelligentTieringConfiguration',
            'PutBucketInventoryConfiguration',
            'PutBucketLifecycleConfiguration',
            'PutBucketLogging',
            'PutBucketMetricsConfiguration',
            'PutBucketNotificationConfiguration',
            'PutBucketOwnershipControls',
            'PutBucketPolicy',
            'PutBucketReplication',
            'PutBucketRequestPayment',
            'PutBucketTagging',
            'PutBucketVersioning',
            'PutBucketWebsite',
            'PutObject',
            'PutObjectAcl',
            'PutObjectLegalHold',
            'PutObjectLockConfiguration',
            'PutObjectRetention',
            'PutObjectTagging',
            'PutPublicAccessBlock',
            'RestoreObject',
            'UploadPart',
            'UploadPartCopy',
            'WriteGetObjectResponse'
        ];

        foreach ($operations  as $operation) {
            yield $operation => [
                $operation
            ];
        }
    }

    public function testS3ParserReturnsRetryableErrorOnNotParsableBody()
    {
        $parser = $this->getS3Parser();
        $command = new Command('ListBuckets', [], new HandlerList());
        $response = new Response(200, [], 'not parsable');
        try {
            $parser($command, $response);
        } catch (AwsException $e) {
            $this->assertTrue($e->isConnectionError());
            $errorMessage = [
                'Error parsing response for ListBuckets: ',
                'AWS parsing error: Error parsing XML: String could not be parsed as XML'
            ];
            $this->assertEquals(join('', $errorMessage), $e->getMessage());
        }
    }

    public function testAddsS3ResultMutator()
    {
        $testField = 'TestField';
        $testValue = 'TestValue';
        $s3MutatorName = 's3.test-mutator';
        $s3Parser = $this->getS3Parser();
        $s3Parser->addS3ResultMutator(
            $s3MutatorName,
            new class($testField, $testValue) implements S3ResultMutator
            {
                /**
                 * @var string $testField
                 */
                private $testField;
                /**
                 * @var string $testValue
                 */
                private $testValue;
                public function __construct($testField, $testValue)
                {
                    $this->testField = $testField;
                    $this->testValue = $testValue;
                }

                public function __invoke(
                    ResultInterface $result,
                    CommandInterface $command,
                    ResponseInterface $response
                ): ResultInterface
                {
                    $result[$this->testField] = $this->testValue;

                    return $result;
                }
            }
        );
        $mutators = $s3Parser->getS3ResultMutators();
        $command = new Command('ListBuckets', [], new HandlerList());
        $response = new Response();
        $result = $s3Parser($command, $response);

        $this->assertTrue(isset($mutators[$s3MutatorName]));
        $this->assertEquals($testValue, $result[$testField]);
    }

    public function testRemovesS3ResultMutator()
    {
        $s3Parser = $this->getS3Parser();
        $s3MutatorName = 's3.test-mutator';
        $s3Parser->addS3ResultMutator(
            $s3MutatorName,
            new class implements S3ResultMutator
            {
                public function __invoke(
                    ResultInterface $result,
                    CommandInterface $command,
                    ResponseInterface $response
                ): ResultInterface
                {
                    return $result;
                }
            }
        );
        $mutators = $s3Parser->getS3ResultMutators();
        $this->assertTrue(isset($mutators[$s3MutatorName]));
        $s3Parser->removeS3ResultMutator($s3MutatorName);
        $mutators = $s3Parser->getS3ResultMutators();
        $this->assertFalse(isset($mutators[$s3MutatorName]));
    }

    /**
     * @param StreamInterface $stream
     * @param bool $expectValidation
     *
     * @dataProvider validate200ErrorValidationJustInSeekableStreamsProvider
     *
     * @return void
     */
    public function testValidate200ErrorValidationJustInSeekableStreams(
        StreamInterface $stream,
        bool $expectValidation
    ): void
    {
        if ($expectValidation) {
            $this->expectException(AwsException::class);
            $this->expectExceptionMessage(
                'We encountered an internal error. Please try again.'
            );
        } else {
            $this->assertTrue(true);
        }

        $s3Parser = $this->getS3Parser();
        $command = new Command('HeadObject', [], new HandlerList());
        $response = new Response(
            200,
            [],
            $stream
        );
        $s3Parser($command, $response);
    }

    /**
     * @return array[]
     */
    public function validate200ErrorValidationJustInSeekableStreamsProvider(): array
    {
        return [
            'seekable_stream_1' => [
                'stream' => Utils::streamFor(self::INTERNAL_S3200_ERROR),
                'expectValidation' => true,
            ],
            'no_seekable_stream_1' => [
                'stream' => new NoSeekStream(
                    Utils::streamFor(self::INTERNAL_S3200_ERROR)
                ),
                'expectValidation' => false,
            ]
        ];
    }

    private function getS3Parser(): S3Parser
    {
        $apiProvider = ApiProvider::defaultProvider();
        $api = new Service(
            ApiProvider::resolve(
                $apiProvider,
                'api',
                's3',
                'latest'
            ),
            $apiProvider
        );
        $protocolParser = Service::createParser($api);
        $errorParser = Service::createErrorParser($api->getProtocol() ,$api);

        return new S3Parser(
            $protocolParser,
            $errorParser,
            $api
        );
    }
}
