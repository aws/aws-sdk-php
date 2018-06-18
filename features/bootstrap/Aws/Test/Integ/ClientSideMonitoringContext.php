<?php
namespace Aws\Test\Integ;

use Aws\ClientSideMonitoring\ConfigurationProvider;
use Aws\ClientSideMonitoring\Exception\ConfigurationException;
use Aws\Command;
use Aws\Credentials\Credentials;
use Aws\Exception\AwsException;
use Aws\MockHandler;
use Aws\MonitoringEventsInterface;
use Aws\Result;
use Aws\Sdk;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class ClientSideMonitoringContext extends \PHPUnit_Framework_Assert
    implements Context, SnippetAcceptingContext
{

    /**
     * Original environment variables before class instantiated
     * @var array
     */
    private static $originalEnv;

    /**
     * @var Sdk
     */
    private $sdk;

    private $testData;
    private $allExpectedEvents = [];
    private $allGeneratedEvents = [];
    private $defaultEnv = [];

    private $configKeys = [
        'region' => 'region'
    ];

    private $udpConfig = [
        'address' => '127.0.0.1',
        'port' => 31000,
        'shutdown' => 'shutdown'
    ];

    /**
     * @BeforeSuite
     */
    public static function saveOriginalEnv()
    {
        self::$originalEnv = [
            'enabled' => getenv(ConfigurationProvider::ENV_ENABLED) ?: '',
            'port' => getenv(ConfigurationProvider::ENV_PORT) ?: '',
            'client_id' => getenv(ConfigurationProvider::ENV_CLIENT_ID) ?: '',
            'profile' => getenv(ConfigurationProvider::ENV_PROFILE) ?: '',
        ];
    }

    /**
     * @AfterSuite
     */
    public static function restoreOriginalEnv()
    {
        putenv(ConfigurationProvider::ENV_ENABLED . '=' .
            self::$originalEnv['enabled']);
        putenv(ConfigurationProvider::ENV_PORT . '=' .
            self::$originalEnv['port']);
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=' .
            self::$originalEnv['client_id']);
        putenv(ConfigurationProvider::ENV_PROFILE . '=' .
            self::$originalEnv['profile']);
    }

    /**
     * @Given I have a test file called :filename
     */
    public function iHaveATestFileCalled($filename)
    {
        $this->testData = json_decode(
            file_get_contents(__DIR__ . '/test_cases/' . $filename),
            true
        );

        if (!empty($this->testData['defaults']['configuration']['environmentVariables'])) {
            foreach ($this->testData['defaults']['configuration']['environmentVariables']
                     as $key => $value) {
                $this->defaultEnv[$key] = $value;
            }
        }
        $this->clearAndSetDefaultEnv();

        $sharedConfig = [
            'version' => 'latest'
        ];
        foreach($this->testData['defaults']['configuration'] as $key => $value) {
            if (array_key_exists($key, $this->configKeys)) {
                $sharedConfig[$this->configKeys[$key]] = $value;
            }
        }
        if (isset($this->testData['defaults']['configuration']['accessKey'])) {
            $sharedConfig['credentials'] = new Credentials(
                $this->testData['defaults']['configuration']['accessKey'],
                'test-secret'
            );
        }
        $this->sdk = new Sdk($sharedConfig);
    }

    /**
     * @When I run the test cases with mocked responses against a test socket server
     */
    public function iRunTheTestCasesWithMockedResponsesAgainstATestSocketServer()
    {
        $pid = pcntl_fork();
        if ($pid == 0) {
            try {
                $this->startUdpServer();
            } catch (\Exception $e) {
                exit();
            }
        } else {
            sleep(1);

            foreach ($this->testData['cases'] as $case) {
                $this->clearAndSetDefaultEnv();
                $events = [];
                if (!empty($case['configuration']['environmentVariables'])) {
                    foreach ($case['configuration']['environmentVariables'] as $key => $value) {
                        putenv("{$key}={$value}");
                    }
                }
                foreach($case['apiCalls'] as $apiCall) {
                    $client = $this->sdk->createClient($apiCall['serviceId']);
                    $list = $client->getHandlerList();
                    $command = new Command($apiCall['operationName'], $apiCall['params']);
                    $request = new Request('POST', 'http://foo.com/bar/baz');
                    $responses = [];
                    foreach($apiCall['attemptResponses'] as $attemptResponse) {
                        $responses[] = $this->generateResponse($attemptResponse, $command);
                    }
                    $handler = new MockHandler($responses);
                    $list->setHandler($handler);
                    $handler = $list->resolve();

                    try {
                        /**
                         * @var Result $result
                         */
                        $result = $handler($command, $request)->wait();
                        $events = array_merge($events, $result->getMonitoringEvents());
                    } catch (\Exception $e) {
                        if ($e instanceof MonitoringEventsInterface) {
                            $events = array_merge($events, $e->getMonitoringEvents());
                        }
                    }
                }
                $this->allExpectedEvents = array_merge($this->allExpectedEvents,
                    $case['expectedMonitoringEvents']);
                $this->allGeneratedEvents = array_merge($this->allGeneratedEvents,
                    $events);
            }

            $this->sendSocketShutdownMessage();
        }
    }

    /**
     * @Then The generated events should match the expected events
     */
    public function theGeneratedEventsShouldMatchTheExpectedEvents()
    {
        $this->compareMonitoringEvents($this->allExpectedEvents,
            $this->allGeneratedEvents);
    }

    /**
     * @Then The received datagrams should match the expected events
     */
    public function theReceivedDatagramsShouldMatchTheExpectedEvents()
    {
        $received = file_get_contents($this->getOutputFilename());
        $events = json_decode($received, true);
        $this->compareMonitoringEvents($this->allExpectedEvents, $events);
    }

    private function clearAndSetDefaultEnv()
    {
        putenv(ConfigurationProvider::ENV_ENABLED . '=');
        putenv(ConfigurationProvider::ENV_PORT . '=');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=');
        putenv(ConfigurationProvider::ENV_PROFILE . '=');

        foreach($this->defaultEnv as $key => $value) {
            putenv("{$key}={$value}");
        }
    }

    private function compareMonitoringEvents($expected, $actual)
    {
        $this->assertSame(count($expected), count($actual));
        foreach($expected as $index => $expectedEvent) {
            $actualEvent = $actual[$index];
            foreach($expectedEvent as $key => $value) {
                $this->assertTrue(isset($actualEvent[$key]));
                switch ($value) {
                    case "ANY_INT":
                        $this->assertInternalType('int', $actualEvent[$key]);
                        break;
                    case "ANY_STR":
                        $this->assertInternalType('string', $actualEvent[$key]);
                        break;
                    default:
                        $this->assertEquals($value, $actualEvent[$key]);
                }
            }
            $allowedFields = array_merge(array_keys($expectedEvent),
                $this->testData['defaults']['optionalEventFields'][$actualEvent['Type']]);
            foreach($actualEvent as $key => $value) {
                $this->assertTrue(in_array($key, $allowedFields));
            }
        }
    }

    private function generateResponse($attemptResponse, $command)
    {
        if (isset($attemptResponse['errorCode']) ) {
            $context = [
                'code' => $attemptResponse['errorCode'],
                'message' => $attemptResponse['errorMessage'],
                'response' => new Response($attemptResponse['httpStatus']),
                'transfer_stats' => [
                    'total_time' => .12,
                    'primary_ip' => '12.34.56.78',
                    'namelookup_time' => .012
                ]
            ];

            return new AwsException($attemptResponse['errorMessage'],
                $command,
                $context);
        }
        if (isset($attemptResponse['sdkException'])) {
            return new ConfigurationException(
                $attemptResponse['sdkException']['message'],555
            );
        }
        if (isset($attemptResponse['httpStatus'])) {
            $params = [
                '@metadata' => [
                    'statusCode' => $attemptResponse['httpStatus'],
                    'transferStats' => [
                        'http' => [
                            [
                                'total_time' => .12,
                                'primary_ip' => '12.34.56.78',
                                'namelookup_time' => .012,
                            ]
                        ]
                    ]
                ]
            ];
            return new Result($params);
        }

        throw new \InvalidArgumentException('attemptResponse data does not contain required fields.');
    }

    private function getOutputFilename()
    {
        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        return $dir . '/test_datagrams.json';
    }

    private function sendSocketShutdownMessage()
    {
        $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_clear_error($socket);
        socket_connect($socket, $this->udpConfig['address'], $this->udpConfig['port']);
        socket_write($socket, $this->udpConfig['shutdown'], strlen($this->udpConfig['shutdown']));
        socket_close($socket);
    }

    private function startUdpServer()
    {
        set_time_limit(0);
        $localPort = 0;
        $remoteAddress = 0;

        $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_bind($socket, $this->udpConfig['address'], $this->udpConfig['port']);

        if (file_exists($this->getOutputFilename())) {
            unlink($this->getOutputFilename());
        }
        $outputFile = fopen($this->getOutputFilename(), 'a');
        $isFirstDatagram = true;
        fwrite($outputFile, '[');

        while (true) {
            socket_recvfrom($socket,$buf, 8096, 0, $remoteAddress, $localPort);
            if ($buf == $this->udpConfig['shutdown']) {
                fwrite($outputFile, ']');
                socket_close($socket);
                exit();
            }
            if (!$isFirstDatagram) {
                fwrite($outputFile, ',');
            } else {
                $isFirstDatagram = false;
            }
            fwrite($outputFile, $buf);
        }
    }
}
