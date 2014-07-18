<?php
namespace Aws\Test\Common\Api\Parser;

use Aws\Common\Api\Service;
use Aws\AwsClient;
use Aws\Common\ClientFactory;
use Aws\Common\Credentials\NullCredentials;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream;

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
                    $description = $this->createServiceApi([
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
            'api'          => $service,
            'credentials'  => new NullCredentials(),
            'client'       => new Client(),
            'signature'    => $this->getMock('Aws\Commom\Signature\SignatureInterface'),
            'region'       => 'us-west-2',
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'error_parser' => function () {}
        ]);

        $cf = new ClientFactory();
        $rc = new \ReflectionClass($cf);
        $rm = $rc->getMethod('applyProtocol');
        $rm->setAccessible(true);

        $rm->invoke($cf, $client, 'http://foo.com');
        $command = $client->getCommand($name, []);

        // Create a response based on the serialized property of the test.
        $response = new Response(
            $res['status_code'],
            $res['headers'],
            Stream\create($res['body'])
        );

        $trans = new CommandTransaction($client, $command);
        $trans->setResponse($response);
        $event = new ProcessEvent($trans);
        $command->getEmitter()->emit('process', $event);
        $result = $event->getResult()->toArray();

        if (strpos($about, 'Timestamp members') !== false) {
            $result['TimeMember'] = strtotime($result['TimeMember']);
        }

        $this->assertEquals($expectedResult, $result);
    }
}
