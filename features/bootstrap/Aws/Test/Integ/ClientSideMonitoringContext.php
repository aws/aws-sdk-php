<?php

namespace Aws\Test\Integ;

use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\AwsClient;
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
     * Child process ID used by the test UDP server
     * @var int
     */
    private static $childPid;

    /**
     * Original environment variables before class instantiated
     * @var array
     */
    private static $originalEnv;

    /**
     * Store output filename for the UDP server's received datagrams
     * @var string
     */
    private static $outputFile;

    /**
     * @var Sdk
     */
    private $sdk;

    private $defaultEnv = [];
    private $sharedConfig;
    private $testApiProvider;
    private $testData;
    private $testDir;
    private $testServices = [];

    private $configKeys = [
        'region' => 'region',
    ];

    private $udpConfig = [
        'address' => '127.0.0.1',
        'port' => 31000,
        'shutdown' => 'shutdown',
    ];

    public function __construct()
    {
        $this->testDir = __DIR__ . "/csm";
    }

    /**
     * @BeforeScenario
     */
    public static function prepare()
    {
        if (!extension_loaded('pcntl') || !function_exists('pcntl_fork')) {
            throw new \RuntimeException("Test skipped because the 'pcntl' extension is not loaded or enabled.");
        }
        if (!extension_loaded('sockets') || !function_exists('socket_create')) {
            throw new \RuntimeException("Test skipped because the 'sockets' extension is not loaded or enabled.");
        }

        self::$originalEnv = [
            'enabled' => getenv(ConfigurationProvider::ENV_ENABLED) ?: '',
            'port' => getenv(ConfigurationProvider::ENV_PORT) ?: '',
            'client_id' => getenv(ConfigurationProvider::ENV_CLIENT_ID) ?: '',
            'profile' => getenv(ConfigurationProvider::ENV_PROFILE) ?: '',
        ];

        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        self::$outputFile = $dir . '/test_datagrams.json';
    }

    /**
     * @AfterScenario
     */
    public static function cleanup()
    {
        putenv(ConfigurationProvider::ENV_ENABLED . '=' .
            self::$originalEnv['enabled']);
        putenv(ConfigurationProvider::ENV_PORT . '=' .
            self::$originalEnv['port']);
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=' .
            self::$originalEnv['client_id']);
        putenv(ConfigurationProvider::ENV_PROFILE . '=' .
            self::$originalEnv['profile']);

        if (file_exists(self::$outputFile)) {
            unlink(self::$outputFile);
        }

        if (!empty(self::$childPid) && posix_getpgid(self::$childPid) !== false) {
            if (posix_kill(self::$childPid, SIGTERM) === false) {
                posix_kill(self::$childPid, SIGKILL);
            };
        }
    }

    /**
     * @Given I have loaded a test manifest file called :filename
     */
    public function iHaveLoadedATestManifestFileCalled($filename)
    {
        $manifest = json_decode(
            file_get_contents("{$this->testDir}/data/{$filename}"),
            true
        );
        $provider = ApiProvider::manifest("{$this->testDir}/data/", $manifest);
        $serviceDirectories = glob("{$this->testDir}/data/*" , GLOB_ONLYDIR);
        foreach ($serviceDirectories as $directory) {
            $definition = $provider('api', basename($directory), 'latest');
            $service = new Service($definition, $provider);
            $this->testServices[$service->getServiceId()] = $service;
        }
        $this->testApiProvider = $provider;
    }

    /**
     * @Given I have loaded a test case file called :filename
     */
    public function iHaveLoadedATestCaseFileCalled($filename)
    {
        $this->testData = json_decode(
            file_get_contents("{$this->testDir}/{$filename}"),
            true
        );

        if (!empty($this->testData['defaults']['configuration']['environmentVariables'])) {
            foreach ($this->testData['defaults']['configuration']['environmentVariables']
                     as $key => $value) {
                $this->defaultEnv[$key] = $value;
            }
        }

        $sharedConfig = [
            'version' => 'latest'
        ];
        foreach ($this->testData['defaults']['configuration'] as $key => $value) {
            if (array_key_exists($key, $this->configKeys)) {
                $sharedConfig[$this->configKeys[$key]] = $value;
            }
        }
        if (isset($this->testData['defaults']['configuration']['accessKey'])) {
            $sharedConfig['credentials'] = $this->createCredentials(
                $this->testData['defaults']['configuration']
            );
        }
        $this->sharedConfig = $sharedConfig;
        $this->sdk = new Sdk($sharedConfig);
    }

    /**
     * @Then I successfully run the test cases against a test server
     */
    public function iSuccessfullyRunTheTestCasesAgainstATestServer()
    {
        foreach ($this->testData['cases'] as $case) {

            $pid = pcntl_fork();

            if ($pid === -1) {
                throw new \RuntimeException("Test failed because 'pcntl_fork' was unable to fork PHP process.");
            } elseif ($pid === 0) {
                try {
                    $this->startUdpServer();
                } catch (\Exception $e) {
                    exit();
                }
            } else {
                try {
                    self::$childPid = $pid;

                    usleep(500000);

                    if (isset($case['configuration']['environmentVariables'])) {
                        $this->clearAndSetEnv($case['configuration']['environmentVariables']);
                    } else {
                        $this->clearAndSetEnv($this->defaultEnv);
                    }

                    $events = [];
                    $params = $this->prepareTestCaseParams($case);

                    foreach ($case['apiCalls'] as $apiCall) {
                        $client = $this->createClientForApiCall($apiCall, $params);
                        $list = $client->getHandlerList();
                        $command = new Command($apiCall['operationName'], $apiCall['params']);
                        $request = new Request('POST', (string)$client->getEndpoint());
                        $handler = new MockHandler();
                        foreach ($apiCall['attemptResponses'] as $attemptResponse) {
                            $response = $this->generateResponse($attemptResponse, $command);
                            if ($response instanceof \Exception &&
                                !($response instanceof AwsException)) {
                                $handler->appendException($response);
                            } else {
                                $handler->append($response);
                            }
                        }
                        $list->setHandler($handler);
                        $handler = $list->resolve();

                        try {
                            /** @var Result $result */
                            $result = $handler($command, $request)->wait();
                            $events = array_merge($events, $result->getMonitoringEvents());
                        } catch (\Exception $e) {
                            if ($e instanceof MonitoringEventsInterface) {
                                $events = array_merge($events, $e->getMonitoringEvents());
                            }
                        }
                    }

                    $this->sendSocketShutdownMessage();
                    usleep(500000);

                    $this->compareMonitoringEvents(
                        $case['expectedMonitoringEvents'],
                        $events
                    );

                    $received = file_get_contents(self::$outputFile);
                    $receivedEvents = json_decode($received, true);
                    $this->compareMonitoringEvents(
                        $case['expectedMonitoringEvents'],
                        $receivedEvents
                    );
                } catch (\Exception $e) {
                    $this->sendSocketShutdownMessage();
                    throw $e;
                }
            }
        }
    }

    private function clearAndSetEnv($env)
    {
        putenv(ConfigurationProvider::ENV_ENABLED . '=');
        putenv(ConfigurationProvider::ENV_PORT . '=');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=');
        putenv(ConfigurationProvider::ENV_PROFILE . '=');

        foreach ($env as $key => $value) {
            putenv("{$key}={$value}");
        }
    }

    private function compareMonitoringEvents($expected, $actual)
    {
        $this->assertSame(count($expected), count($actual));
        foreach ($expected as $index => $expectedEvent) {
            $actualEvent = $actual[$index];
            foreach ($expectedEvent as $key => $value) {
                $this->assertArrayHasKey($key, $actualEvent);
                $this->validateEventValue($value, $actualEvent[$key]);
            }
            $allowedFields = array_merge(
                array_keys($expectedEvent),
                array_keys($this->testData['defaults']['optionalEventFields'][$actualEvent['Type']])
            );
            foreach ($actualEvent as $key => $value) {
                $this->assertTrue(in_array($key, $allowedFields));
                if (in_array($key, $this->testData['defaults']['optionalEventFields'][$actualEvent['Type']])) {
                    $this->validateEventValue(
                        $this->testData['defaults']['optionalEventFields'][$actualEvent['Type']],
                        $value
                    );
                }
            }
        }
    }

    private function createClientForApiCall(array $apiCall, array $params)
    {
        /** @var Service $service */
        if (!empty($service = $this->testServices[$apiCall['serviceId']])) {
            $params['service'] = $service->getEndpointPrefix();
            $params['api_provider'] = $this->testApiProvider;
            $params += $this->sharedConfig;
            return new AwsClient($params);
        }

        return $this->sdk->createClient(
            $apiCall['serviceId'],
            $params
        );
    }

    private function createCredentials(array $configuration)
    {
        if (!empty($configuration['sessionToken'])) {
            $token = $configuration['sessionToken'];
        } else {
            $token = null;
        }

        return new Credentials(
            $configuration['accessKey'],
            'test-secret',
            $token
        );
    }

    private function generateResponse($attemptResponse, $command)
    {
        $transferStats = [
            'total_time' => !empty($attemptResponse['totalTime'])
                ? $attemptResponse['totalTime']
                : 0.12,
            'primary_ip' => !empty($attemptResponse['primaryIp'])
                ? $attemptResponse['primaryIp']
                : '12.34.56.78',
            'namelookup_time' => !empty($attemptResponse['namelookupTime'])
                ? $attemptResponse['namelookupTime']
                : 0.012,
        ];

        $headers = [];
        if (isset($attemptResponse['responseHeaders'])) {
            foreach($attemptResponse['responseHeaders'] as $header => $value) {
                $headers[$header] = $value;
            }
        }

        if (!empty($attemptResponse['errorCode'])) {
            $context = [
                'code' => $attemptResponse['errorCode'],
                'message' => $attemptResponse['errorMessage'],
                'response' => new Response($attemptResponse['httpStatus'], $headers),
                'transfer_stats' => $transferStats,
            ];

            return new AwsException($attemptResponse['errorMessage'],
                $command,
                $context
            );
        }
        if (!empty($attemptResponse['sdkException'])) {
            return new ConfigurationException(
                $attemptResponse['sdkException']['message'], 555
            );
        }
        if (!empty($attemptResponse['httpStatus'])) {
            $params = [
                '@metadata' => [
                    'statusCode' => $attemptResponse['httpStatus'],
                    'headers' => $headers,
                    'transferStats' => [
                        'http' => [
                            $transferStats
                        ]
                    ],
                ],
            ];
            return new Result($params);
        }

        throw new \InvalidArgumentException('attemptResponse data does not contain required fields.');
    }

    private function prepareTestCaseParams(array $case)
    {
        $params = [];
        if (!empty($case['configuration']['region'])) {
            $params['region'] = $case['configuration']['region'];
        }
        if (!empty($case['configuration']['accessKey'])) {
            $params['credentials'] = $this->createCredentials($case['configuration']);
        }
        return $params;
    }

    private function sendSocketShutdownMessage()
    {
        $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_clear_error($socket);
        socket_connect(
            $socket,
            $this->udpConfig['address'],
            $this->udpConfig['port']
        );
        socket_write(
            $socket,
            $this->udpConfig['shutdown'],
            strlen($this->udpConfig['shutdown'])
        );
        socket_close($socket);
    }

    private function startUdpServer()
    {
        set_time_limit(60);
        $localPort = 0;
        $remoteAddress = 0;
        $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_bind($socket, $this->udpConfig['address'], $this->udpConfig['port']);
        $events = [];

        while (true) {
            socket_recvfrom($socket, $buf, 8096, 0, $remoteAddress, $localPort);

            if ($buf == $this->udpConfig['shutdown']) {
                file_put_contents(self::$outputFile, json_encode($events));
                socket_close($socket);
                exit();
            }
            $events[] = json_decode($buf, true);
        }
    }

    private function validateEventValue($expected, $actual)
    {
        switch ($expected) {
            case "ANY_INT":
                $this->assertInternalType('int', $actual);
                break;
            case "ANY_STR":
                $this->assertInternalType('string', $actual);
                break;
            default:
                $this->assertEquals($expected, $actual);
        }
    }
}
