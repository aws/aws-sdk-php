<?php
namespace Aws\Test\Api\Parser;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Credentials\NullCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream;

/**
 * @covers Aws\Api\Parser\AbstractParser
 * @covers Aws\Api\Parser\AbstractRestParser
 * @covers Aws\Api\Parser\JsonRpcParser
 * @covers Aws\Api\Parser\JsonParser
 * @covers Aws\Api\Parser\RestJsonParser
 * @covers Aws\Api\Parser\RestXmlParser
 * @covers Aws\Api\Parser\QueryParser
 * @covers Aws\Api\Parser\XmlParser
 */
class ComplianceTest extends \PHPUnit_Framework_TestCase
{
    public function testCaseProvider()
    {
        $cases = [];

        $files = glob(__DIR__ . '/../test_cases/protocols/output/*.json');
        foreach ($files as $file) {
            $data = json_decode(file_get_contents($file), true);
            foreach ($data as $suite) {
                $suite['metadata']['type'] = $suite['metadata']['protocol'];
                foreach ($suite['cases'] as $case) {
                    $description = new Service([
                        'metadata'   => $suite['metadata'],
                        'shapes'     => $suite['shapes'],
                        'operations' => [
                            $case['given']['name'] => $case['given']
                        ]
                    ]);
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
        $client = new AwsClient([
            'api'         => $service,
            'credentials' => new NullCredentials(),
            'client'      => new Client(),
            'signature'   => $service->createSignature('foo', 'v4'),
            'region'      => 'us-west-2'
        ]);

        $service->applyProtocol($client, 'http://foo.com');
        $command = $client->getCommand($name, []);

        // Create a response based on the serialized property of the test.
        $response = new Response(
            $res['status_code'],
            $res['headers'],
            Stream\create($res['body'])
        );

        $event = new ProcessEvent($command, $client, null, $response);
        $command->getEmitter()->emit('process', $event);
        $result = $event->getResult()->toArray();

        if (strpos($about, 'Timestamp members') !== false) {
            $result['TimeMember'] = strtotime($result['TimeMember']);
        }

        $this->assertEquals($expectedResult, $result);
    }
}
