<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\ClientFactory;
use Aws\Credentials\NullCredentials;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandTransaction;

/**
 * @covers Aws\Api\Serializer\QuerySerializer
 * @covers Aws\Api\Serializer\JsonRpcSerializer
 * @covers Aws\Api\Serializer\RestSerializer
 * @covers Aws\Api\Serializer\RestJsonSerializer
 * @covers Aws\Api\Serializer\RestXmlSerializer
 * @covers Aws\Api\Serializer\JsonBody
 * @covers Aws\Api\Serializer\XmlBody
 * @covers Aws\Api\Serializer\Ec2ParamBuilder
 * @covers Aws\Api\Serializer\QueryParamBuilder
 */
class ComplianceTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCaseProvider()
    {
        $cases = [];

        $files = glob(__DIR__ . '/../test_cases/protocols/input/*.json');
        foreach ($files as $file) {
            $data = json_decode(file_get_contents($file), true);
            foreach ($data as $suite) {
                $suite['metadata']['type'] = $suite['metadata']['protocol'];
                foreach ($suite['cases'] as $case) {
                    $description = new Service(function () use ($suite, $case) {
                        return [
                            'metadata' => $suite['metadata'],
                            'shapes' => $suite['shapes'],
                            'operations' => [
                                $case['given']['name'] => $case['given']
                            ]
                        ];
                    }, 'service', 'region');
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
        $ep = 'http://us-east-1.foo.amazonaws.com';
        $client = new AwsClient([
            'api' => $service,
            'credentials' => new NullCredentials(),
            'client' => new Client(),
            'signature' => $this->getMock('Aws\Signature\SignatureInterface'),
            'region' => 'us-west-2',
            'endpoint' => $ep,
            'error_parser' => Service::createErrorParser($service->getProtocol()),
            'serializer'   => Service::createSerializer($service, $ep),
            'version'      => 'latest'
        ]);

        $cf = new ClientFactory();
        $rc = new \ReflectionClass($cf);
        $rm = $rc->getMethod('applyParser');
        $rm->setAccessible(true);

        $rm->invoke($cf, $client, 'http://foo.com');
        $command = $client->getCommand($name, $args);
        $trans = new CommandTransaction($client, $command);
        /** @var callable $serializer */
        $serializer = $this->readAttribute($client, 'serializer');
        $request = $serializer($trans);
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
                if ($serialized['body'] && strpos($serialized['body'], '</')) {
                    $serialized['body'] = str_replace(
                        ' />',
                        '/>',
                        '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
                            . $serialized['body']
                    );
                    $body = trim($body);
                }
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
