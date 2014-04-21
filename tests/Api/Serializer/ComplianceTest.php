<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Credentials\NullCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\PrepareEvent;

/**
 * @covers Aws\Api\Serializer
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
                if ($suite['metadata']['type'] == 'rest-xml') continue;
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

        // Normalize the JSON data
        $body = str_replace(':', ': ', $request->getBody());
        $body = str_replace(',', ', ', $body);

        $this->assertEquals($serialized['body'], $body);

        if (isset($serialized['headers'])) {
            foreach ($serialized['headers'] as $key => $value) {
                $this->assertSame($value, $request->getHeader($key));
            }
        }
    }
}
