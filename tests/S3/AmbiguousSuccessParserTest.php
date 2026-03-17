<?php
namespace Aws\Test\S3;

use Aws\Api\ApiProvider;
use Aws\Api\ErrorParser\XmlErrorParser;
use Aws\Command;
use Aws\CommandInterface;
use Aws\S3\AmbiguousSuccessParser;
use Aws\S3\Exception\S3Exception;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use Psr\Http\Message\ResponseInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(AmbiguousSuccessParser::class)]
class AmbiguousSuccessParserTest extends TestCase
{
    private $instance;

    public function set_up()
    {
        $parser = function () {};
        $errorParser = function () {
            return ['code' => 'InternalError', 'message' => 'Sorry!'];
        };

        $this->instance = new AmbiguousSuccessParser(
            $parser,
            $errorParser,
            S3Exception::class
        );
    }

    #[DataProvider('opsWithAmbiguousSuccessesProvider')]
    public function testConvertsAmbiguousSuccessesToExceptions($operation)
    {
        $this->expectExceptionMessage("Sorry!");
        $this->expectException(\Aws\S3\Exception\S3Exception::class);
        $command = $this->getMockBuilder(CommandInterface::class)->getMock();
        $command->expects($this->any())
            ->method('getName')
            ->willReturn($operation);
        $response = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $response->expects($this->any())
            ->method('getStatusCode')
            ->willReturn(200);

        $instance = $this->instance;
        $instance($command, $response);
    }

    #[DataProvider('opsWithoutAmbiguousSuccessesProvider')]
    #[DoesNotPerformAssertions]
    public function testIgnoresAmbiguousSuccessesOnUnaffectedOperations(string $operation)
    {
        $command = $this->getMockBuilder(CommandInterface::class)->getMock();
        $command->expects($this->any())
            ->method('getName')
            ->willReturn($operation);
        $response = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $response->expects($this->any())
            ->method('getStatusCode')
            ->willReturn(200);

        $instance = $this->instance;
        $instance($command, $response);
    }

    #[DataProvider('opsWithAmbiguousSuccessesProvider')]
    public function testThrowsConnectionErrorForEmptyBody($operation)
    {
        $this->expectExceptionMessage("An error connecting to the service occurred while performing the");
        $this->expectException(\Aws\S3\Exception\S3Exception::class);
        $parser = function() {};
        $errorParser = new XmlErrorParser();
        $instance = new AmbiguousSuccessParser(
            $parser,
            $errorParser,
            S3Exception::class
        );

        $command = new Command($operation);
        $response = new Response(200, [], "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n\n\n");
        $instance($command, $response);
    }

    public static function opsWithAmbiguousSuccessesProvider(): array
    {
        return [
            ['CopyObject'],
            ['UploadPart'],
            ['UploadPartCopy'],
            ['CompleteMultipartUpload'],
        ];
    }

    public static function opsWithoutAmbiguousSuccessesProvider(): array
    {
        $provider = ApiProvider::defaultProvider();
        return array_map(
            function ($op) { return [$op]; },
            array_diff(
                array_keys($provider('api', 's3', 'latest')['operations']),
                array_map(
                    function (array $args) { return $args[0]; },
                    self::opsWithAmbiguousSuccessesProvider()
                )
            )
        );
    }
}
