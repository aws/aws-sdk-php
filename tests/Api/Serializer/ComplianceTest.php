<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Credentials\NullCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\PrepareEvent;

/**
 * @covers Aws\Api\Serializer\QuerySerializer
 * @covers Aws\Api\Serializer\JsonRpcSerializer
 * @covers Aws\Api\Serializer\RestSerializer
 * @covers Aws\Api\Serializer\RestJsonSerializer
 * @covers Aws\Api\Serializer\RestXmlSerializer
 * @covers Aws\Api\Serializer\JsonBody
 * @covers Aws\Api\Serializer\XmlBody
 */
class ComplianceTest extends \PHPUnit_Framework_TestCase
{
    public function testCaseProvider()
    {
        $cases = [];

        $files = glob(__DIR__ . '/../test_cases/protocols/input/*.json');
        foreach ($files as $file) {
            $data = json_decode(file_get_contents($file), true);
            foreach ($data as $suite) {
                $suite['metadata']['type'] = $suite['metadata']['protocol'];
                foreach ($suite['cases'] as $case) {
                    $description = new Service([
                        'metadata' => $suite['metadata'],
                        'shapes' => $suite['shapes'],
                        'operations' => [
                            $case['given']['name'] => $case['given']
                        ]
                    ]);
                    $cases[] = [
                        $file . ': ' . $suite['description'],
                        $description,
                        $case['given']['name'],
                        $case['params'],
                        $case['serialized']
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
        array $args,
        $serialized
    ) {
        $client = new AwsClient([
            'api' => $service,
            'credentials' => new NullCredentials(),
            'client' => new Client(),
            'signature' => $service->createSignature('foo', 'v4'),
            'region' => 'us-west-2'
        ]);

        $service->applyProtocol($client, 'http://foo.com');
        $command = $client->getCommand($name, $args);
        $event = $command->getEmitter()->emit(
            'prepare',
            new PrepareEvent($command, $client)
        );

        $request = $event->getRequest();
        $this->assertEquals($serialized['uri'], $request->getResource());

        $body = (string) $request->getBody();
        switch ($service->getMetadata('type')) {
            case 'json':
            case 'rest-json':
                // Normalize the JSON data.
                $body = str_replace(':', ': ', $request->getBody());
                $body = str_replace(',', ', ', $body);
                break;
            case 'rest-xml':
                // Normalize XML data.
                $serialized['body'] = '<?xml version="1.0" encoding="UTF-8"?>'
                    . "\n" . $serialized['body'] . "\n";
                $serialized['body'] = str_replace(' />', '/>', $serialized['body']);
                break;
        }

        $this->assertEquals($serialized['body'], $body);

        if (isset($serialized['headers'])) {
            foreach ($serialized['headers'] as $key => $value) {
                $this->assertSame($value, $request->getHeader($key));
            }
        }
    }
}
