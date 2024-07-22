<?php

namespace Aws\Test\S3\Parser;

use Aws\Api\ApiProvider;
use Aws\AwsClientInterface;
use Aws\Result;
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
     * @param $responseAlgorithms
     * @param $checksumHeadersReturned
     * @param $expectedChecksum

     * @return void
     */
    public function testValidatesChoosesRightChecksum(
        $responseAlgorithms, $checksumHeadersReturned, $expectedChecksum
    ) {
        $mutator = $this->getValidateResponseChecksumMutator();
        $response = new Response(200, [], "response body");
        foreach ($checksumHeadersReturned as $header) {
            $response = $response->withAddedHeader('x-amz-checksum-' . $header, "abc");
        }

        $chosenChecksum = $mutator->chooseChecksumHeaderToValidate(
            $responseAlgorithms,
            $response
        );

        $this->assertEquals($expectedChecksum, $chosenChecksum);
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
            [['crc32', 'crc32c'], [], null],
            [['sha256', 'crc32'], ['sha256'], "sha256"],
            [['crc32', 'crc32c'], ["sha256", "crc32"], "crc32"],
            [['crc32', 'crc32c'], ['crc64'], null],
        ];
    }

    public function testValidatesChecksumFailsOnBadValue() {
        $mutator = $this->getValidateResponseChecksumMutator();
        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader('x-amz-checksum-sha256', "abc");
        $chosenChecksum = $mutator->validateChecksum(
            ['sha256'],
            $response
        );

        $this->assertEquals("FAILED", $chosenChecksum['status']);
    }

    public function testValidatesChecksumSucceeds() {
        $mutator = $this->getValidateResponseChecksumMutator();
        $expectedValue = "E6TOUbfBBDPqSyozecOzDgB3K9CZKCI6d7PbKBAYvo0=";
        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader('x-amz-checksum-sha256', $expectedValue);

        $chosenChecksum = $mutator->validateChecksum(
            ['sha256'],
            $response
        );

        $this->assertEquals("SUCCEEDED", $chosenChecksum['status']);
        $this->assertEquals("sha256", $chosenChecksum['checksum']);
        $this->assertEquals($expectedValue, $chosenChecksum['checksumHeaderValue']);
    }

    public function testValidatesChecksumSkipsValidation() {
        $mutator = $this->getValidateResponseChecksumMutator();
        $response = new Response(200, [], "response body");
        $chosenChecksum = $mutator->validateChecksum(
            [],
            $response
        );

        $this->assertEquals("SKIPPED", $chosenChecksum['status']);
    }

    public function testSkipsGetObjectReturnsFullMultipart() {
        $s3 = $this->getTestS3Client();
        $mutator = new ValidateResponseChecksumResultMutator($s3->getApi());
        $command = $s3->getCommand("GetObject", ["ChecksumMode" => "enabled"]);
        $expectedValue = "E6TOUbfBBDPqSyozecOzDgB3K9CZKCI6d7PbK-1034";
        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader('x-amz-checksum-sha256', $expectedValue);
        $result = new Result([]);
        $mutator($result, $command, $response);

        //if it reached here, it didn't throw the error
        self::assertTrue(true);
    }

    public function testValidatesSha256() {
        $s3 = $this->getTestS3Client();
        $mutator = new ValidateResponseChecksumResultMutator($s3->getApi());
        $command = $s3->getCommand("GetObject", ["ChecksumMode" => "enabled"]);
        $expectedValue = "E6TOUbfBBDPqSyozecOzDgB3K9CZKCI6d7PbKBAYvo0=";
        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader('x-amz-checksum-sha256', $expectedValue);
        $result = new Result([]);
        $result = $mutator($result, $command, $response);

        //if it reached here, it didn't throw the error
        self::assertSame("SHA256", $result['ChecksumValidated']);
    }

    /**
     * Returns an instance of ValidateResponseChecksumResultMutator
     * for testing purposes.
     *
     * @return ValidateResponseChecksumResultMutator
     */
    private function getValidateResponseChecksumMutator(): ValidateResponseChecksumResultMutator
    {
        return new ValidateResponseChecksumResultMutator($this->getTestS3Client()->getApi());
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
}
