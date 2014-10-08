<?php
namespace Aws\Test\Common\Api\Parser;

use GuzzleHttp\Command\Command;
use Aws\Common\Api\Service;
use Aws\Common\Api\Shape;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

/**
 * @covers Aws\Common\Api\Parser\AbstractParser
 * @covers Aws\Common\Api\Parser\AbstractRestParser
 * @covers Aws\Common\Api\Parser\JsonRpcParser
 * @covers Aws\Common\Api\Parser\JsonParser
 * @covers Aws\Common\Api\Parser\RestJsonParser
 * @covers Aws\Common\Api\Parser\RestXmlParser
 * @covers Aws\Common\Api\Parser\QueryParser
 * @covers Aws\Common\Api\Parser\XmlParser
 */
class ComplianceTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCaseProvider()
    {
        $cases = [];

        $files = glob(__DIR__ . '/../test_cases/protocols/output/*.json');
        foreach ($files as $file) {
            $data = json_decode(file_get_contents($file), true);
            foreach ($data as $suite) {
                $suite['metadata']['type'] = $suite['metadata']['protocol'];
                foreach ($suite['cases'] as $case) {
                    $description = new Service(function () use ($suite, $case) {
                        return [
                            'metadata'   => $suite['metadata'],
                            'shapes'     => $suite['shapes'],
                            'operations' => [
                                $case['given']['name'] => $case['given']
                            ]
                        ];
                    }, 'service', 'version');
                    $cases[] = [
                        $file . ': ' . $suite['description'],
                        $description,
                        $case['given']['name'],
                        $case['result'],
                        $case['response']
                    ];
                }
            }
        }

        return $cases;
    }

    /**
     * @dataProvider testCaseProvider
     */
    public function testPassesComplianceTest(
        $about,
        Service $service,
        $name,
        array $expectedResult,
        $res
    ) {
        $parser = Service::createParser($service);
        $command = new Command($name);

        // Create a response based on the serialized property of the test.
        $response = new Response(
            $res['status_code'],
            $res['headers'],
            Stream::factory($res['body'])
        );

        $result = $parser($command, $response)->toArray();
        $this->fixTimestamps($result, $service->getOperation($name)->getOutput());
        $this->assertEquals($expectedResult, $result);
    }

    private function fixTimestamps(&$data, Shape $shape)
    {
        switch (get_class($shape)) {
            case 'Aws\Common\Api\StructureShape':
                foreach ($data as $key => &$value) {
                    if ($shape->hasMember($key)) {
                        $this->fixTimestamps($value, $shape->getMember($key));
                    }
                }
                break;
            case 'Aws\Common\Api\ListShape':
                foreach ($data as &$value) {
                    $this->fixTimestamps($value, $shape->getMember());
                }
                break;
            case 'Aws\Common\Api\MapShape':
                foreach ($data as &$value) {
                    $this->fixTimestamps($value, $shape->getValue());
                }
                break;
            case 'Aws\Common\Api\TimestampShape':
                if (is_string($data)) {
                    $data = strtotime($data);
                }
                break;
        }
    }
}
