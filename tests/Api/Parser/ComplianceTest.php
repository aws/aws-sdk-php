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

    public const TEST_CASES_DIR = __DIR__ . '/../test_cases/protocols/output/';

    private static array $excludedCases = [
        // We use `timestampFormat` to customize serialization
        'RestJsonDateTimeWithFractionalSeconds' => true,
        'AwsQueryDateTimeWithFractionalSeconds' => true,
        'Ec2QueryDateTimeWithFractionalSeconds' => true,
        'AwsJson11DateTimeWithFractionalSeconds' => true,
        'RestXmlDateTimeWithFractionalSeconds' => true,
        // Certain packages depend on a non-empty payload field
        // In particular, S3 where some packages always expect a 'Body'
        // regardless of its contents (empty vs non-empty)
        'HttpPayloadTraitsWithNoBlobBody' => true,
        'RestJsonHttpPayloadTraitsWithNoBlobBody' => true,
        // previously we used a flattened list's target shape `locationName`
        // to determine flattened list location names. This contradicts the
        // behavior prescribed by Smithy, but only seems to have applied to
        // SimpleDB, which is deprecated.
        'legacy query Flattened list with location name' => true
    ];

    /** @doesNotPerformAssertions */
    public function testCaseProvider(): \Generator
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                self::TEST_CASES_DIR,
                \FilesystemIterator::SKIP_DOTS
            )
        );

        foreach ($iterator as $file) {
            $path = $file->getRealPath();
            $data = json_decode(file_get_contents($path), true, JSON_THROW_ON_ERROR);
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
                    $service = new Service($serviceData, function () { return []; });
                    if (!empty($case['error'])) {
                        if (empty($case['errorCode'])) {
                            throw new \InvalidArgumentException(
                                'Protocol test error cases must have associated "errorType" value.'
                            );
                        }
                        $result = $case['error'];
                    } elseif (!empty($case['result'])) {
                        $result = $case['result'];
                    } else {
                        $result = $case['params'] ?? [];
                    }

                    $id = $case['id'] ?? $case['description'] ?? $suite['protocol'] . uniqid();
                    if (!isset(self::$excludedCases[$id])) {
                        yield $id => [
                            $file . ': ' . $suite['description'],
                            $service,
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
        }
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
        string $about,
        Service $service,
        string $name,
        array $expectedResult,
        array $res,
        ?string $errorCode = null,
        ?string $errorMessage = null
    ): void
    {
        $command = new Command($name);

        // Create a response based on the serialized property of the test.
        $response = new Psr7\Response(
            $res['status_code'] ?? 200,
            $res['headers'] ?? [],
            isset($res['body']) ? Psr7\Utils::streamFor($res['body']) : null
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

    private function fixTimestamps(mixed &$data, Shape $shape): void
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
                // Handle case where list data comes back as a string
                if (is_string($data)) {
                    $data = $this->parseListString($data);
                }

                if (is_array($data)) {
                    foreach ($data as &$value) {
                        $this->fixTimestamps($value, $shape->getMember());
                    }
                }
                break;
            case MapShape::class:
                foreach ($data as &$value) {
                    $this->fixTimestamps($value, $shape->getValue());
                }
                break;
            case TimestampShape::class:
                // Handle legacy cases where data might be an array
                if (is_array($data)) {
                    foreach ($data as &$item) {
                        $item = TimestampShape::format($item, 'unixTimestamp');
                    }
                } else {
                    // Format the DateTimeResult as a Unix timestamp
                    $data = TimestampShape::format($data, 'unixTimestamp');
                }
                break;
        }
    }

    private function parseListString(string $str): array
    {
        // Handle CSV-like string with quoted values
        $values = [];
        $current = '';
        $inQuotes = false;
        $escaped = false;

        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];

            if ($escaped) {
                $current .= $char;
                $escaped = false;
                continue;
            }

            if ($char === '\\') {
                $escaped = true;
                continue;
            }

            if ($char === '"') {
                if ($inQuotes) {
                    // Check if this is a closing quote
                    $nextChar = ($i + 1 < strlen($str)) ? $str[$i + 1] : '';
                    if ($nextChar === ',' || $nextChar === '' || ctype_space($nextChar)) {
                        $inQuotes = false;
                        continue;
                    } else {
                        // It's a quote inside the value
                        $current .= $char;
                    }
                } else {
                    $inQuotes = true;
                    continue;
                }
            }

            if ($char === ',' && !$inQuotes) {
                // Check if this might be a comma inside a timestamp
                // Timestamps have the pattern "Day, DD Mon YYYY HH:MM:SS GMT"
                $trimmedCurrent = trim($current);
                if ($this->looksLikePartialTimestamp($trimmedCurrent)) {
                    // This comma is part of a timestamp, don't split here
                    $current .= $char;
                    continue;
                }

                $values[] = $trimmedCurrent;
                $current = '';
                // Skip any whitespace after comma
                while ($i + 1 < strlen($str) && ctype_space($str[$i + 1])) {
                    $i++;
                }
                continue;
            }

            $current .= $char;
        }

        // Add the last value
        if ($current !== '') {
            $values[] = trim($current);
        }

        return $values;
    }

    private function looksLikePartialTimestamp(string $str): bool
    {
        // Check if this looks like the start of an HTTP date timestamp
        // HTTP dates start with day name: Mon, Tue, Wed, Thu, Fri, Sat, Sun
        static $dayNames = [
            'Mon' => true,
            'Tue' => true,
            'Wed' => true,
            'Thu' => true,
            'Fri' => true,
            'Sat' => true,
            'Sun' => true
        ];

        if (isset($dayNames[$str])) {
            return true;
        }

        return false;
    }
}
