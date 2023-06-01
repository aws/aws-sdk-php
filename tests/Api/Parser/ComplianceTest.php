<?php
namespace Aws\Test\Api\Parser;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\StructureShape;
use Aws\Api\TimestampShape;
use Aws\Command;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\Parser\AbstractParser
 * @covers \Aws\Api\Parser\AbstractRestParser
 * @covers \Aws\Api\Parser\JsonRpcParser
 * @covers \Aws\Api\Parser\JsonParser
 * @covers \Aws\Api\Parser\RestJsonParser
 * @covers \Aws\Api\Parser\RestXmlParser
 * @covers \Aws\Api\Parser\QueryParser
 * @covers \Aws\Api\Parser\XmlParser
 */
class ComplianceTest extends TestCase
{
    use UsesServiceTrait;

    /** @doesNotPerformAssertions */
    public function testCaseProvider()
    {
        $cases = [];

        $files = glob(__DIR__ . '/../test_cases/protocols/output/*.json');
        foreach ($files as $file) {
            $data = json_decode(file_get_contents($file), true);
            foreach ($data as $suite) {
                $suite['metadata']['type'] = $suite['metadata']['protocol'];
                foreach ($suite['cases'] as $case) {
                    $serviceData = [
                        'metadata'   => $suite['metadata'],
                        'shapes'     => $suite['shapes'],
                        'operations' => [
                            $case['given']['name'] => $case['given']
                        ]
                    ];
                    $description = new Service($serviceData, function () { return []; });
                    if (!empty($case['error'])) {
                        if (empty($case['errorCode'])) {
                            throw new \InvalidArgumentException('Protocol test error cases must have associated "errorType" value.');
                        }
                        $result = $case['error'];
                    } elseif (!empty($case['result'])) {
                        $result = $case['result'];
                    } else {
                        $result = [];
                    }
                    $cases[] = [
                        $file . ': ' . $suite['description'],
                        $description,
                        $case['given']['name'],
                        $result,
                        $case['response'],
                        !empty($case['errorCode'])
                            ? $case['errorCode']
                            : null,
                        !empty($case['errorMessage'])
                            ? $case['errorMessage']
                            : null
                    ];
                }
            }
        }

        return $cases;
    }

    /**
     * @dataProvider testCaseProvider
     *
     * @param $about
     * @param Service $service
     * @param $name
     * @param array $expectedResult
     * @param $res
     * @param string|null $errorCode
     * @param string|null $errorMessage
     */
    public function testPassesComplianceTest(
        $about,
        Service $service,
        $name,
        array $expectedResult,
        $res,
        $errorCode = null,
        $errorMessage = null
    ) {
        $command = new Command($name);

        // Create a response based on the serialized property of the test.
        $response = new Psr7\Response(
            $res['status_code'],
            $res['headers'],
            Psr7\Utils::streamFor($res['body'])
        );

        if (!is_null($errorCode)) {
            $parser = Service::createErrorParser($service->getProtocol(), $service);
            $parsed = $parser($response, $command);
            $result = $parsed['body'];
            $this->assertSame($errorCode, $parsed['code']);
            if (!is_null($errorMessage)) {
                $this->assertSame($errorMessage, $parsed['message']);
            }
        } else {
            $parser = Service::createParser($service);
            $result = $parser($command, $response)->toArray();
        }

        $this->fixTimestamps($result, $service->getOperation($name)->getOutput());
        $this->assertEquals($expectedResult, $result);
    }

    private function fixTimestamps(&$data, Shape $shape)
    {
        switch (get_class($shape)) {
            case StructureShape::class:
                if ($data && !$shape['document']) {
                    foreach ($data as $key => &$value) {
                        if ($shape->hasMember($key)) {
                            $this->fixTimestamps($value, $shape->getMember($key));
                        }
                    }
                }
                break;
            case ListShape::class:
                foreach ($data as &$value) {
                    $this->fixTimestamps($value, $shape->getMember());
                }
                break;
            case MapShape::class:
                foreach ($data as &$value) {
                    $this->fixTimestamps($value, $shape->getValue());
                }
                break;
            case TimestampShape::class:
                // Format the DateTimeResult as a Unix timestamp.
                $data = $data->format('U');
                break;
        }
    }
}
