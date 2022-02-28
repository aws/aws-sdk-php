<?php
namespace Aws\Test\S3;

use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\S3\ValidateResponseChecksumParser;
use Aws\Test\UsesServiceTrait;
use Aws\S3\GetBucketLocationParser;
use Aws\Command;
use Aws\Result;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3\ValidateResponseChecksumParser
 */
class ValidateResponseChecksumParserTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider getChosenChecksumCases
     */
    public function testValidatesChoosesRightChecksum(
        $responseAlgorithms, $checksumHeadersReturned, $expectedChecksum
    ) {
        $s3 = $this->getTestClient(
            's3',
            ['api_provider' => ApiProvider::filesystem(__DIR__ . '/fixtures')]
        );
        $parser = new ValidateResponseChecksumParser(function () {
            return new Result();
        },
        $s3->getApi());

        $response = new Response(200, [], "response body");
        foreach ($checksumHeadersReturned as $header) {
            $response = $response->withAddedHeader('x-amz-checksum-' . $header, "abc");
        }

        $chosenChecksum = $parser->chooseChecksumHeaderToValidate(
            $responseAlgorithms,
            $response
        );

        $this->assertEquals($expectedChecksum, $chosenChecksum);
    }

    public function getChosenChecksumCases()
    {
        return [
            [['crc32', 'crc32c'], [], null],
            [['sha256', 'crc32'], ['sha256'], "sha256"],
            [['crc32', 'crc32c'], ["sha256", "crc32"], "crc32"],
            [['crc32', 'crc32c'], ['crc64'], null],
        ];
    }

    public function testValidatesChecksumFailsOnBadValue() {
        $s3 = $this->getTestClient(
            's3',
            ['api_provider' => ApiProvider::filesystem(__DIR__ . '/fixtures')]
        );
        $parser = new ValidateResponseChecksumParser(function () {
            return new Result();
        },
            $s3->getApi()
        );

        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader('x-amz-checksum-sha256', "abc");

        $chosenChecksum = $parser->validateChecksum(
            ['sha256'],
            $response
        );

        $this->assertEquals("FAILED", $chosenChecksum['status']);
    }

    public function testValidatesChecksumSucceeds() {
        $s3 = $this->getTestClient(
            's3',
            ['api_provider' => ApiProvider::filesystem(__DIR__ . '/fixtures')]
        );
        $parser = new ValidateResponseChecksumParser(function () {
            return new Result();
        },
            $s3->getApi()
        );
        $expectedValue = "E6TOUbfBBDPqSyozecOzDgB3K9CZKCI6d7PbKBAYvo0=";
        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader('x-amz-checksum-sha256', $expectedValue);

        $chosenChecksum = $parser->validateChecksum(
            ['sha256'],
            $response
        );

        $this->assertEquals("SUCCEEDED", $chosenChecksum['status']);
        $this->assertEquals("sha256", $chosenChecksum['checksum']);
        $this->assertEquals($expectedValue, $chosenChecksum['checksumHeaderValue']);
    }

    public function testValidatesChecksumSkipsValidation() {
        $s3 = $this->getTestClient(
            's3',
            ['api_provider' => ApiProvider::filesystem(__DIR__ . '/fixtures')]
        );
        $parser = new ValidateResponseChecksumParser(function () {
            return new Result();
        },
            $s3->getApi()
        );
        $response = new Response(200, [], "response body");
        $chosenChecksum = $parser->validateChecksum(
            [],
            $response
        );

        $this->assertEquals("SKIPPED", $chosenChecksum['status']);
    }

    public function testSkipsGetObjectReturnsFullMultipart() {
        $s3 = $this->getTestClient(
            's3',
            ['api_provider' => ApiProvider::filesystem(__DIR__ . '/fixtures')]
        );
        $parser = new ValidateResponseChecksumParser(function () {
            return new Result();
        },
            $s3->getApi()
        );
        $command = $s3->getCommand("GetObject", ["ChecksumMode" => "enabled"]);
        $expectedValue = "E6TOUbfBBDPqSyozecOzDgB3K9CZKCI6d7PbK-1034";
        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader('x-amz-checksum-sha256', $expectedValue);
        $result = $parser($command, $response);

        //if it reached here, it didn't throw the error
        self::assertTrue(true);
    }

    public function testValidatesSha256() {
        $s3 = $this->getTestClient(
            's3',
            ['api_provider' => ApiProvider::filesystem(__DIR__ . '/fixtures')]
        );
        $parser = new ValidateResponseChecksumParser(function () {
            return new Result();
        },
            $s3->getApi()
        );
        $command = $s3->getCommand("GetObject", ["ChecksumMode" => "enabled"]);
        $expectedValue = "E6TOUbfBBDPqSyozecOzDgB3K9CZKCI6d7PbKBAYvo0=";
        $response = new Response(200, [], "response body");
        $response = $response->withAddedHeader('x-amz-checksum-sha256', $expectedValue);
        $result = $parser($command, $response);

        //if it reached here, it didn't throw the error
        self::assertSame("SHA256", $result['ChecksumValidated']);
    }
}
