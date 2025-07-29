<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Signature\SignatureInterface;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\Serializer\QuerySerializer
 * @covers \Aws\Api\Serializer\JsonRpcSerializer
 * @covers \Aws\Api\Serializer\RestSerializer
 * @covers \Aws\Api\Serializer\RestJsonSerializer
 * @covers \Aws\Api\Serializer\RestXmlSerializer
 * @covers \Aws\Api\Serializer\JsonBody
 * @covers \Aws\Api\Serializer\XmlBody
 * @covers \Aws\Api\Serializer\Ec2ParamBuilder
 * @covers \Aws\Api\Serializer\QueryParamBuilder
 */
class ComplianceTest extends TestCase
{
    use UsesServiceTrait;

    public const TEST_CASES_DIR = __DIR__ . '/../test_cases/protocols/input/';

    private static array $excludedCases = [
        'RestJsonNullAndEmptyHeaders' => true,
        'NullAndEmptyHeaders' => true,
        'RestJsonHttpChecksumRequired' => true,
        'MediaTypeHeaderInputBase64' => true,
        // For payload members, the behavior prescribed by Smithy
        // contradicts expected behavior in actual AWS Services.
        // See S3 PutBucketLifecycleConfiguration
        'XmlAttributesOnPayload' => true,
        'HttpPayloadWithXmlNamespaceAndPrefix' => true,
        'HttpPayloadWithXmlNamespace' => true,
        'RestXmlHttpPayloadWithUnion' => true,
        'HttpPayloadWithMemberXmlName' => true
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
            $data = json_decode(file_get_contents($path), true);
            foreach ($data as $suite) {
                foreach ($suite['cases'] as $case) {
                    $serviceData = [
                        'metadata' => $suite['metadata'],
                        'shapes' => $suite['shapes'],
                        'operations' => [
                            $case['given']['name'] => $case['given']
                        ]
                    ];
                    $service = new Service(
                        $serviceData,
                        function () { return []; }
                    );

                    $id = $case['id'] ?? $case['description'] ?? $suite['protocol'] . uniqid();
                    if (!isset(self::$excludedCases[$id])) {
                        yield $id => [
                            $service,
                            $case['given']['name'],
                            $case['params'] ?? [],
                            $case['serialized'],
                            $suite['clientEndpoint'] ?? null
                        ];
                    }
                }
            }
        }
    }

    /**
     * @dataProvider testCaseProvider
     */
    public function testPassesComplianceTest(
        Service $service,
        $name,
        array $args,
        array $serialized,
        ?string $clientEndpoint
    ): void
    {
        $ep = $clientEndpoint ?? 'http://us-east-1.foo.amazonaws.com';
        $client = new AwsClient([
            'service'      => 'foo',
            'api_provider' => function () use ($service) {
                return $service->toArray();
            },
            'credentials'  => false,
            'signature'    => $this->getMockBuilder(SignatureInterface::class)->getMock(),
            'region'       => 'us-west-2',
            'endpoint'     => $ep,
            'error_parser' => Service::createErrorParser($service->getProtocol()),
            'serializer'   => Service::createSerializer($service, $ep),
            'version'      => 'latest',
            'validate'     => false,
            'idempotency_auto_fill' => function ($length) {
                return str_repeat(chr(0x00), $length);
            }
        ]);

        $command = $client->getCommand($name, $args);
        $request = \Aws\serialize($command);

        if (isset($serialized['method'])) {
            $this->assertEquals($serialized['method'], $request->getMethod());
        }
        $this->assertEquals($serialized['uri'], $request->getRequestTarget());

        $body = (string) $request->getBody();

        switch ($protocol = $service->getProtocol()) {
            case 'json':
            case 'rest-json':
                if (!empty($serialized['body'])) {
                    $body = json_encode(json_decode($body, true));
                    $serialized['body'] = json_encode(json_decode($serialized['body'], true));
                }

                break;
            case 'rest-xml':
                // Remove XML declaration from body
                $body = preg_replace('/<\?xml[^>]*\?>\s*/', '', $body);
                break;
        }

        if (isset($serialized['method'])) {
            $this->assertEquals($serialized['method'], $request->getMethod());
        }

        if (isset($serialized['body'])) {
            if ($protocol === 'rest-xml' && !empty($serialized['body'])) {
                $this->assertXmlEquals($serialized['body'], $body);
            } else {
                $this->assertEqualsIgnoringCase($serialized['body'], $body);
            }
        }

        if (isset($serialized['host'])) {
            $expectedHost = $serialized['host'];

            if (strpos($expectedHost, '/') !== false) {
                // Expected host contains a path, compare full authority + path
                $actualHostWithPath = $request->getUri()->getHost() . $request->getUri()->getPath();
                $this->assertStringStartsWith($expectedHost, $actualHostWithPath);
            } else {
                // Expected host is just hostname, compare hostname only
                $this->assertEquals($expectedHost, $request->getUri()->getHost());
            }
        }

        if (isset($serialized['requireHeaders'])) {
            foreach ($serialized['requireHeaders'] as $header) {
                $this->assertTrue($request->hasHeader($header));
            }
        }

        if (isset($serialized['headers'])) {
            foreach ($serialized['headers'] as $key => $expectedValue) {
                $headerValues = $request->getHeader($key);

                // Custom join logic that matches the expected format
                $actualValue = $this->formatHeaderValues($headerValues);
                $this->assertEquals($expectedValue, $actualValue, "Header {$key} mismatch");
            }
        }

        if (isset($serialized['forbidHeaders'])) {
            foreach ($serialized['forbidHeaders'] as $header) {
                $this->assertNotTrue($request->hasHeader($header));
            }
        }
    }

    private function assertXmlEquals(
        string $expected,
        string $actual,
        string $message = ''
    ): void
    {
        if (!$this->isValidXml($expected) || !$this->isValidXml($actual)) {
            $this->assertEquals($expected, $actual, $message ?: 'Content is not XML, using string comparison');
            return;
        }

        // Parse both documents
        $expectedDoc = new \DOMDocument();
        $actualDoc = new \DOMDocument();

        $expectedDoc->preserveWhiteSpace = false;
        $actualDoc->preserveWhiteSpace = false;

        $expectedDoc->loadXML($expected);
        $actualDoc->loadXML($actual);

        // Normalize both documents
        $expectedDoc->normalize();
        $actualDoc->normalize();

        // Compare the canonical form
        $this->assertEquals(
            $expectedDoc->C14N(),  // Canonical XML
            $actualDoc->C14N(),
            $message
        );
    }

    private function isValidXml(string $string): bool
    {
        if (empty($string) || strpos($string, '<') === false) {
            return false;
        }

        $doc = new \DOMDocument();
        $oldUseErrors = libxml_use_internal_errors(true);
        $result = $doc->loadXML($string);
        libxml_use_internal_errors($oldUseErrors);

        return $result;
    }

    private function formatHeaderValues(array $values): string
    {
        if (count($values) === 1) {
            return $values[0];
        }

        $formatted = array_map(function($value) {
            if ($this->isDateHeader($value)) {
                return $value;
            }

            if (strpos($value, ',') !== false || strpos($value, '"') !== false) {
                return '"' . str_replace('"', '\"', $value) . '"';
            }
            return $value;
        }, $values);

        return implode(', ', $formatted);
    }

    private function isDateHeader(string $value): int|false
    {
        // Match common HTTP date format
        return preg_match(
            '/^\w{3},\s+\d{1,2}\s+\w{3}\s+\d{4}\s+\d{2}:\d{2}:\d{2}\s+GMT$/',
            $value
        );
    }
}
