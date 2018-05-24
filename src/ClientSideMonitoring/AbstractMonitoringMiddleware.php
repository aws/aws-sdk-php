<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Aws\ResultInterface;
use GuzzleHttp\Promise\Promise;
use Psr\Http\Message\RequestInterface;

/**
 * @internal
 */
abstract class AbstractMonitoringMiddleware
{
    private static $socket;

    private $nextHandler;
    private $options;
    private $region;
    private $service;

    /**
     * Data format for event properties to be sent to the monitoring agent.
     *
     * Associative array of associative arrays in the format:
     *     $eventKey => [
     *         'valueObject' => CommandInterface::class|RequestInterface::class|ResultInterface::class
     *         'valueAccessor' => callable
     *         'maxLength' => int
     *     ]
     * @return array
     */
    public static function getDataConfiguration()
    {
        return [
            'Api' => [
                'valueObject' => CommandInterface::class,
                'valueAccessor' => function (CommandInterface $cmd) {
                    return $cmd->getName();
                }
            ],
            'Timestamp' => [
                'valueObject' => null,
                'valueAccessor' => function () {
                    return floor(microtime(true) * 1000);
                }
            ],
            'Version' => [
                'valueObject' => null,
                'valueAccessor' => function () {
                    return 1;
                }
            ],
        ];
    }

    protected static function getResultHeaderAccessor($headerName)
    {
        return function (ResultInterface $result) use ($headerName) {
            if (isset($result['@metadata']['headers'][$headerName])) {
                return $result['@metadata']['headers'][$headerName];
            }
            return null;
        };
    }

    /**
     * Standard middleware wrapper function, with CSM options passed in
     *
     * @param  $options
     * @param  $region
     * @param  $service
     * @return callable
     */
    public static function wrap($options, $region, $service)
    {
        return function (callable $handler) use ($options, $region, $service) {
            $class = get_called_class();
            return new $class($handler, $options, $region, $service);
        };
    }

    /**
     * Constructor stores the passed in handler and options
     *
     * @param callable $handler
     * @param mixed $options
     * @param  $region
     * @param  $service
     */
    public function __construct(callable $handler, $options, $region, $service)
    {
        $this->nextHandler = $handler;
        $this->options = $options;
        $this->region = $region;
        $this->service = $service;
    }

    /**
     * Standard invoke pattern for middleware execution to be implemented by child classes
     *
     * @param  CommandInterface $cmd
     * @param  RequestInterface $request
     * @return Promise
     * @todo Confirm with Bret that @monitoringEvents can be added to result
     */
    public function __invoke(CommandInterface $cmd, RequestInterface $request)
    {
        $handler = $this->nextHandler;
        $eventData = null;
        if ($this->isEnabled()) {
            $eventData = $this->populateRequestEventData(
                $cmd,
                $request,
                $this->getGlobalEventData()
            );
        }

        return $handler($cmd, $request)->then(
            function (ResultInterface $result) use ($eventData) {
                if ($this->isEnabled()) {
                    $eventData = $this->populateResultEventData($result, $eventData);
                    if (empty($result['@monitoringEvents'])) {
                        $result['@monitoringEvents'] = [];
                    }
                    $result['@monitoringEvents'] []= $eventData;
                    $this->sendEventData($eventData);
                }
                return $result;
            }
        );
    }

    /**
     * Returns the client ID from options, unwrapping options if necessary
     *
     * @return string
     */
    private function getClientId()
    {
        return $this->unwrappedOptions()->getClientId();
    }

    private function getGlobalEventData()
    {
        $event = [
            'ClientId' => $this->getClientId(),
            'Region' => $this->getRegion(),
            'Service' => $this->getService(),
            'Version' => 1
        ];
        return $event;
    }

    /**
     * Returns port from options, unwrapping options if necessary
     *
     * @return int
     */
    private function getPort()
    {
        return $this->unwrappedOptions()->getPort();
    }

    private function getRegion()
    {
        return $this->region;
    }

    private function getService()
    {
        return $this->service;
    }

    /**
     * Returns enabled flag from options, unwrapping options if necessary
     *
     * @return bool
     */
    private function isEnabled()
    {
        return $this->unwrappedOptions()->isEnabled();
    }

    /**
     * Returns $eventData array with information from the request and command.
     *
     * @param CommandInterface $cmd
     * @param RequestInterface $request
     * @param array $event
     * @return array
     */
    protected function populateRequestEventData(
        CommandInterface $cmd,
        RequestInterface $request,
        array $event
    ) {
        $dataFormat = static::getDataConfiguration();
        foreach ($dataFormat as $eventKey => $datum) {
            $value = null;
            if (empty($datum['valueObject'])) {
                $value = $datum['valueAccessor']();
            } elseif ($datum['valueObject'] === CommandInterface::class) {
                $value = $datum['valueAccessor']($cmd);
            } elseif ($datum['valueObject'] === RequestInterface::class) {
                $value = $datum['valueAccessor']($request);
            }
            if (!is_null($value)) {
                $event[$eventKey] = $value;
            }
        }
        return $event;
    }

    /**
     * Returns $eventData array with information from the response, including the calculation
     * for attempt latency
     *
     * @param array $event
     * @param ResultInterface $result
     * @return array
     */
    protected function populateResultEventData(
        ResultInterface $result,
        array $event
    ) {
        $dataFormat = static::getDataConfiguration();
        foreach ($dataFormat as $eventKey => $datum) {
            $value = null;
            if (empty($datum['valueObject'])) {
                $value = $datum['valueAccessor']();
            } elseif ($datum['valueObject'] === ResultInterface::class) {
                $value = $datum['valueAccessor']($result);
            }
            if (!is_null($value)) {
                $event[$eventKey] = $value;
            }
        }
        return $event;
    }

    /**
     * Creates a UDP socket resource and stores it with the class, or retrieves it if already
     * instantiated and connected. Handles error-checking and re-connecting if necessary.
     * If $forceNewConnection is set to true, a new socket will be created.
     *
     * @param  bool $forceNewConnection
     * @return Resource
     */
    private function prepareSocket($forceNewConnection = false)
    {
        if (!is_resource(self::$socket)
            || $forceNewConnection
            || socket_last_error(self::$socket)
        ) {
            self::$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
            socket_clear_error(self::$socket);
            socket_connect(self::$socket, '127.0.0.1', $this->getPort());
        }

        return self::$socket;
    }

    /**
     * Sends formatted monitoring event data via the UDP socket connection to the CSM agent endpoint
     *
     * @param array $eventData
     * @return int
     */
    private function sendEventData(array $eventData)
    {
        $socket = $this->prepareSocket();
        $datagram = $this->serializeEventData($eventData);
        $result = socket_write($socket, $datagram, strlen($datagram));
        if ($result === false) {
            $this->prepareSocket(true);
        }
        return $result;
    }

    /**
     * Serializes the event data with string length limitations, returning a JSON-formatted string.
     *
     * @param array $eventData
     * @return string
     */
    private function serializeEventData(array $eventData)
    {
        $dataFormat = static::getDataConfiguration();
        foreach ($eventData as $eventKey => $datum) {
            if (!empty($dataFormat[$eventKey]['maxLength'])) {
                $eventData[$eventKey] = substr(
                    $datum,
                    0,
                    $dataFormat[$eventKey]['maxLength']
                );
            }
        }
        return json_encode($eventData);
    }

    /**
     * Unwraps options, if needed, and returns them.
     *
     * @return ConfigurationInterface
     */
    private function unwrappedOptions()
    {
        if (!($this->options instanceof ConfigurationInterface)) {
            $this->options = ConfigurationProvider::unwrap($this->options);
        }
        return $this->options;
    }
}