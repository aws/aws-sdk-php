<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Aws\ResultInterface;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;

/**
 * @internal
 */
abstract class AbstractMonitoringMiddleware
{
    /**
     * UDP socket resource
     * @var Resource
     */
    private static $socket;

    /**
     * Next handler in middleware stack
     * @var callable
     */
    protected $nextHandler;

    /**
     * Client-side monitoring options
     * @var array
     */
    protected $options;

    /**
     * Data format for event properties to be sent to the monitoring agent.
     *
     * List of associative arrays in the format:
     *     Subarray keys:
     *     - 'valueObject' => CommandInterface::class, RequestInterface::class, or ResultInterface::class
     *     - 'valueAccessor' => callable
     *     - 'eventKey' => string
     *     - 'maxLength' => int
     *
     * @return array
     */
    protected static function getDataConfiguration() {
        return [];
    }

    /**
     * Standard middleware wrapper function, with CSM options passed in
     *
     * @param  $options
     * @return callable
     */
    public static function wrap($options)
    {
        return function (callable $handler) use ($options) {
            $class = get_called_class();
            return new $class($handler, $options);
        };
    }

    /**
     * Constructor stores the passed in handler and options
     *
     * @param callable $handler
     * @param array $options
     */
    public function __construct(callable $handler, array $options)
    {
        $this->nextHandler = $handler;
        $this->options = $options;
    }

    /**
     * Standard invoke pattern for middleware execution to be implemented by child classes
     *
     * @param  CommandInterface $cmd
     * @param  RequestInterface $request
     * @return Promise
     * @todo When CSMConfigProvider implemented, revisit $this->options code
     */
    public function __invoke(CommandInterface $cmd, RequestInterface $request) {

        $handler = $this->nextHandler;
        $eventData = null;
        if (!empty($this->options['enabled'])) {
            $eventData = $this->populateRequestEventData(
                $cmd,
                $request,
                $this->getGlobalEventData()
            );
        }

        return $handler($cmd, $request)->then(
            function(ResultInterface $result) use ($eventData) {
                if (!empty($this->options['enabled'])) {
                    $eventData = $this->populateResponseEventData($result, $eventData);
                    if (empty($result['@monitoringEvents'])) {
                        $result['@monitoringEvents'] = [];
                    }
                    $result['@monitoringEvents'] []= $eventData;
                    $this->sendEventData($eventData);
                }
                return $result;
            });
    }

    /**
     * Creates a UDP socket resource and stores it with the class, or retrieves it if already
     * instantiated and connected. Handles error-checking and re-connecting if necessary.
     * If $forceNewConnection is set to true, a new socket will be created.
     *
     * @param  bool $forceNewConnection
     * @return Resource
     * @todo When CSMConfigProvider implemented, revisit $this->options code
     */
    private function prepareSocket($forceNewConnection = false)
    {
        if (!is_resource(self::$socket)
            || $forceNewConnection
            || socket_last_error(self::$socket)
        ) {
            if ($this->options instanceof PromiseInterface) {
                $this->options = $this->options->wait(true);
            }
            if ($this->options instanceof CSMConfigInterface) {
                $port = $this->options->getPort();
            } else if (is_array($this->options) && isset($this->options['port'])) {
                $port = $this->options['port'];
            } else {
                $port = 31000;
            }

            self::$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
            socket_clear_error(self::$socket);
            socket_connect(self::$socket, '127.0.0.1', $port);
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
        foreach ($eventData as $key => $datum) {
            if (!empty($dataFormat[$key]['maxLength'])) {
                $eventData[$key] = substr(
                    $datum,
                    0,
                    $dataFormat[$key]['maxLength']
                );
            }
        }
        return json_encode($eventData);
    }

    private function getClientId()
    {
        if ($this->options instanceof CSMConfigInterface) {
            return $this->options->getPort();
        }
        if (is_array($this->options) && !empty($this->options['client_id'])) {
            return $this->options['client_id'];
        }
        return '';
    }

    private function getGlobalEventData()
    {
        $event = [
            'ClientId' => $this->getClientId(),
            'Version' => 1
        ];
        return $event;
    }

    /**
     * Returns $eventData array with information from the request and command.
     *
     * @param CommandInterface $cmd
     * @param RequestInterface $request
     * @return array
     */
    protected function populateRequestEventData(
        CommandInterface $cmd,
        RequestInterface $request,
        array $event
    ) {
        $dataFormat = static::getDataConfiguration();
        foreach ($dataFormat as $datum) {
            if ($datum['valueObject'] === CommandInterface::class) {
                $event[$datum['eventKey']] = $datum['valueAccessor']($cmd);
            } else if ($datum['valueObject'] === RequestInterface::class) {
                $event[$datum['eventKey']] = $datum['valueAccessor']($request);
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
    protected function populateResponseEventData(
        ResultInterface $result,
        array $event
    ) {
        $dataFormat = static::getDataConfiguration();
        foreach ($dataFormat as $datum) {
            if ($datum['valueObject'] === ResultInterface::class) {
                $event['key'] = $datum['valueAccessor']($result);
            }
        }
        return $event;
    }
}