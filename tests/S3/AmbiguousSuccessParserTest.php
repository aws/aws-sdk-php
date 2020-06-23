<?php
namespace Aws\Test\S3;

use Aws\Api\ApiProvider;
use Aws\Api\ErrorParser\XmlErrorParser;
use Aws\Command;
use Aws\CommandInterface;
use Aws\S3\AmbiguousSuccessParser;
use Aws\S3\Exception\S3Exception;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\TestCase;

class AmbiguousSuccessParserTest extends TestCase
{
    private $instance;

    public function setUp()
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

    /**
     * @dataProvider opsWithAmbiguousSuccessesProvider
     * @param string $operation
     *
     * @expectedException \Aws\S3\Exception\S3Exception
     * @expectedExceptionMessage Sorry!
     */
    public function testConvertsAmbiguousSuccessesToExceptions($operation)
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

    /**
     * @dataProvider opsWithoutAmbiguousSuccessesProvider
     * @param string $operation
     */
    public function testIgnoresAmbiguousSuccessesOnUnaffectedOperations($operation)
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

    /**
     * @dataProvider opsWithAmbiguousSuccessesProvider
     *
     * @expectedException \Aws\S3\Exception\S3Exception
     * @expectedExceptionMessage An error connecting to the service occurred while performing the
     */
    public function testThrowsConnectionErrorForEmptyBody($operation)
    {
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

    public function opsWithAmbiguousSuccessesProvider()
    {
        return [
            ['CopyObject'],
            ['UploadPart'],
            ['UploadPartCopy'],
            ['CompleteMultipartUpload'],
        ];
    }

    public function opsWithoutAmbiguousSuccessesProvider()
    {
        $provider = ApiProvider::defaultProvider();
        return array_map(
            function ($op) { return [$op]; },
            array_diff(
                array_keys($provider('api', 's3', 'latest')['operations']),
                array_map(
                    function (array $args) { return $args[0]; },
                    $this->opsWithAmbiguousSuccessesProvider()
                )
            )
        );
    }
}
