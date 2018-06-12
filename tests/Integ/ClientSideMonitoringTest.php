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
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;


class ClientSideMonitoringTest extends TestCase
{

    /**
     * Original environment variables before class instantiated
     * @var array
     */
    private static $originalEnv;

    /**
     * @var Sdk
     */
    private static $sdk;

    /**
     * @var array
     */
    private static $testJson;

    /**
     * @var array
     */
    private static $configKeys = [
        'region' => 'region'
    ];

    public static function setUpBeforeClass()
    {
        self::$testJson = json_decode(
            file_get_contents(__DIR__ . '/test_cases/client_side_monitoring.json'),
            true
        );
        self::$originalEnv = [
            'enabled' => getenv(ConfigurationProvider::ENV_ENABLED) ?: '',
            'port' => getenv(ConfigurationProvider::ENV_PORT) ?: '',
            'client_id' => getenv(ConfigurationProvider::ENV_CLIENT_ID) ?: '',
            'profile' => getenv(ConfigurationProvider::ENV_PROFILE) ?: '',
        ];
        self::clearAndSetDefaultEnv();
        $sharedConfig = [
            'version' => 'latest'
        ];
        foreach(self::$testJson['defaults']['configuration'] as $key => $value) {
            if (array_key_exists($key, self::$configKeys)) {
                $sharedConfig[self::$configKeys[$key]] = $value;
            }
        }
        if (isset(self::$testJson['defaults']['configuration']['accessKey'])) {
            $sharedConfig['credentials'] = new Credentials(
                self::$testJson['defaults']['configuration']['accessKey'],
                'test-secret'
            );
        }
        self::$sdk = new Sdk($sharedConfig);
    }

    public static function tearDownAfterClass()
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

    private static function clearAndSetDefaultEnv()
    {
        putenv(ConfigurationProvider::ENV_ENABLED . '=');
        putenv(ConfigurationProvider::ENV_PORT . '=');
        putenv(ConfigurationProvider::ENV_CLIENT_ID . '=');
        putenv(ConfigurationProvider::ENV_PROFILE . '=');

        if (!empty(self::$testJson['defaults']['configuration']['environmentVariables'])) {
            foreach (self::$testJson['defaults']['configuration']['environmentVariables']
                     as $key => $value) {
                putenv("{$key}={$value}");
            }
        }
    }

    private function compareMonitoringEvents($expected, $actual)
    {
        $this->assertSame(count($expected), count($actual));
        foreach($expected as $index => $expectedEvent) {
            $actualEvent = $actual[$index];
            $this->assertEquals(count($expectedEvent), count($actualEvent));
            foreach($expectedEvent as $key => $value) {
                if ($value == 'ANY') {
                    $this->assertTrue(isset($actualEvent[$key]));
                } else {
                    $this->assertSame($value, $actualEvent[$key]);
                }
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
            return new ConfigurationException($attemptResponse['sdkExceptionMessage'],
            555);
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

    public function testPopulatesMonitoringEvents()
    {
        foreach (self::$testJson['cases'] as $case) {
            self::clearAndSetDefaultEnv();
            $events = [];
            if (!empty($case['configuration']['environmentVariables'])) {
                foreach ($case['configuration']['environmentVariables'] as $key => $value) {
                    putenv("{$key}={$value}");
                }
            }
            foreach($case['apiCalls'] as $apiCall) {
                $client = self::$sdk->createClient($apiCall['serviceId']);
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
                    $result = $handler($command, $request)->wait();
                    $events = array_merge($events, $result->getMonitoringEvents());
                } catch (\Exception $e) {
                    if ($e instanceof MonitoringEventsInterface) {
                        $events = array_merge($events, $e->getMonitoringEvents());
                    }
                }
            }
            $this->compareMonitoringEvents($case['expectedMonitoringEvents'], $events);
        }
    }
}