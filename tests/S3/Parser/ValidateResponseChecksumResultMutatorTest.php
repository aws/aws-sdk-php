<?php

namespace Aws\Test\S3\Parser;

use Aws\Api\ApiProvider;
use Aws\AwsClientInterface;
use Aws\Command;
use Aws\HandlerList;
use Aws\Result;
use Aws\S3\Exception\S3Exception;
use Aws\S3\Parser\ValidateResponseChecksumResultMutator;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Response;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * The tests defined here are similar to the tests
 * from ValidateResponseChecksumParserTest.
 */
class ValidateResponseChecksumResultMutatorTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider checksumCasesDataProvider
     * @param array $responseAlgorithms
     * @param array $checksumHeadersReturned
     * @param string $expectedChecksum
     *
     * @return void
     */
    public function testValidatesChoosesRightChecksum(
        array $responseAlgorithms,
        array $checksumHeadersReturned,
        ?string $expectedChecksumAlgorithm
    ) {
        $s3Client = $this->getTestS3ClientWithResponseAlgorithms(
            'GetObject',
            $responseAlgorithms
        );
        $mutator = new ValidateResponseChecksumResultMutator($s3Client->getApi());
        $result = new Result();
        $command = new Command(
            'GetObject',
            [
                'ChecksumMode' => 'enabled'
            ],
            new HandlerList()
        );
        $response = new Response(200, [], "response body");
        foreach ($checksumHeadersReturned as $header) {
            $response = $response->withAddedHeader(
                'x-amz-checksum-' . $header[0],
                $header[1]
            );
        }

        $result = $mutator($result, $command, $response);

        $this->assertEquals(
            $expectedChecksumAlgorithm,
            $result['ChecksumValidated']
        );
    }

    /**
     * Returns a set of cases for testing
     * checksum selection.
     *
     * @return array[]
     */
    public function checksumCasesDataProvider(): array
    {
        return [
            [
                ['CRC32', 'CRC32C'],
                [],
                null
            ],
            [
                ['SHA256', 'CRC32'],
                [
                    ['sha256', 'E6TOUbfBBDPqSyozecOzDgB3K9CZKCI6d7PbKBAYvo0=']
                ],
                "SHA256"
            ],
            [
                ['CRC32', 'CRC32C'],
                [
                    ["sha256", 'E6TOUbfBBDPqSyozecOzDgB3K9CZKCI6d7PbKBAYvo0='],
                    ['crc32', 'DIt2Ng==']
                ],
                "CRC32"
            ],
            [
                ['CRC32', 'CRC32C'],
                [
                    ['crc64', '']
                ],
                null
            ],
        ];
    }

    public function testValidatesChecksumFailsOnBadValue() {
        $this->expectException(S3Exception::class);
        $this->expectExceptionMessage(
            'Calculated response checksum did not match the expected value'
        );
        $mutator = $this->getValidateResponseChecksumMutator();
        $result = new Result();
        $command = new Command(
            'GetObject',
            [
                'ChecksumMode' => 'enabled'
            ],
            new HandlerList()
        );
        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader(
            'x-amz-checksum-sha256',
            "abc"
        );
        $mutator($result, $command, $response);
    }

    public function testValidatesChecksumSucceeds() {
        $mutator = $this->getValidateResponseChecksumMutator();
        $expectedValue = "E6TOUbfBBDPqSyozecOzDgB3K9CZKCI6d7PbKBAYvo0=";
        $expectedAlgorithm = "SHA256";
        $result = new Result();
        $command = new Command(
            'GetObject',
            [
                'ChecksumMode' => 'enabled'
            ],
            new HandlerList()
        );
        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader(
            'x-amz-checksum-sha256',
            $expectedValue
        );
        $result = $mutator($result, $command, $response);

        $this->assertEquals($expectedAlgorithm, $result['ChecksumValidated']);

    }

    public function testValidatesChecksumSkipsValidation() {
        $mutator = $this->getValidateResponseChecksumMutator();
        $result = new Result();
        $command = new Command(
            'GetObject',
            [
                'ChecksumMode' => 'enabled'
            ],
            new HandlerList()
        );
        $response = new Response(200, [], "response body");
        $result = $mutator($result, $command, $response);

        $this->assertEmpty($result['ChecksumValidated']);
    }

    public function testSkipsGetObjectReturnsFullMultipart() {
        $expectedValue = "E6TOUbfBBDPqSyozecOzDgB3K9CZKCI6d7PbK-1034";
        $mutator = $this->getValidateResponseChecksumMutator();
        $result = new Result();
        $command = new Command(
            'GetObject',
            [
                'ChecksumMode' => 'enabled'
            ],
            new HandlerList()
        );
        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader(
            'x-amz-checksum-sha256',
            $expectedValue
        );
        $mutator($result, $command, $response);

        //if it reached here, it didn't throw the error
        self::assertTrue(true);
    }

    public function testValidatesSha256() {
        $expectedValue = "E6TOUbfBBDPqSyozecOzDgB3K9CZKCI6d7PbKBAYvo0=";
        $mutator = $this->getValidateResponseChecksumMutator();
        $result = new Result();
        $command = new Command(
            'GetObject',
            [
                'ChecksumMode' => 'enabled'
            ],
            new HandlerList()
        );
        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader(
            'x-amz-checksum-sha256',
            $expectedValue
        );
        $result = $mutator($result, $command, $response);
        // if it reached here, it didn't throw the error
        self::assertSame("SHA256", $result['ChecksumValidated']);
    }

    /**
     * Returns an instance of ValidateResponseChecksumResultMutator
     * for testing purposes.
     *
     * @return ValidateResponseChecksumResultMutator
     */
    private function getValidateResponseChecksumMutator(
    ): ValidateResponseChecksumResultMutator
    {
        return new ValidateResponseChecksumResultMutator(
            $this->getTestS3Client()->getApi()
        );
    }

    /**
     * Returns an instance of S3 client for testing purposes.
     *
     * @see \Aws\Test\UsesServiceTrait::getTestClient() for more information.
     *
     * @return AwsClientInterface
     */
    private function getTestS3Client(): AwsClientInterface
    {
        return $this->getTestClient(
            's3',
            ['api_provider' => ApiProvider::filesystem(__DIR__ . '/../fixtures')]
        );
    }

    /**
     * Returns an instance of S3 client, and it alters the api
     * definition to use the provided response algorithms at the
     * command specified.
     *
     * @param string $commandName
     * @param array $responseAlgorithms
     *
     * @see \Aws\Test\UsesServiceTrait::getTestClient() for more information.
     *
     * @return AwsClientInterface
     */
    private function getTestS3ClientWithResponseAlgorithms(
        string $commandName,
        array $responseAlgorithms
    ): AwsClientInterface {
        // Get the client and alter the api definition
        $s3Client = $this->getTestS3Client();
        $clientDefinition = $s3Client->getApi()->getDefinition();
        $httpChecksum = $clientDefinition['operations'][$commandName]['httpChecksum'];
        $httpChecksum['responseAlgorithms'] = $responseAlgorithms;
        $clientDefinition['operations'][$commandName]['httpChecksum'] = $httpChecksum;
        $s3Client->getApi()->setDefinition($clientDefinition);

        return $s3Client;
    }
}
