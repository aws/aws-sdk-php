<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Aws\ResultInterface;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Class AbstractMonitoringMiddleware
 * @package Aws\ClientSideMonitoring
 */
abstract class AbstractMonitoringMiddleware
{

    /**
     * UDP socket resource
     * @var Resource
     */
    protected static $socket;


    /**
     * Socket settings.
     *
     * @var array
     */
    private static $socket_settings = [
        'address' => '127.0.0.1',
        'domain' => AF_INET,
        'protocol' => SOL_UDP,
        'type' => SOCK_DGRAM
    ];


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
     * Constructor stores the passed in handler and options
     *
     * @param callable $handler
     * @param array $options
     * @todo Change depending on resolution of CSM options with Bret
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
     */
    public function __invoke(CommandInterface $cmd, RequestInterface $request) {

        $handler = $this->nextHandler;

        if (!empty($this->options['enabled'])) {
            $eventData = $this->populateRequestEventData($cmd, $request);
        } else {
            $eventData = null;
        }

        return $handler($cmd, $request)->then(function(ResultInterface $result) use ($eventData) {
            if (!empty($this->options['enabled'])) {
                $eventData = $this->serializeEventData($this->populateResponseEventData($eventData, $result));
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
     */
    private function prepareSocket($forceNewConnection = false)
    {
        if (!is_resource(self::$socket) || $forceNewConnection || socket_last_error(self::$socket)) {
            if ($this->options instanceof PromiseInterface) {
                $this->options = $this->options->wait(true);
            };
            if ($this->options instanceof CSMConfigInterface) {
                $port = $this->options->getPort();
            } else if (is_array($this->options) && isset($this->options['port'])) {
                $port = $this->options['port'];
            } else {
                throw new ClientSideMonitoringException('Port setting could not be found for client-side monitoring.');
            }

            self::$socket = socket_create(
                self::$socket_settings['domain'],
                self::$socket_settings['type'],
                self::$socket_settings['protocol']
            );
            socket_connect(self::$socket, self::$socket_settings['address'], $port);
            socket_clear_error(self::$socket);
        }

        return self::$socket;
    }


    /**
     * Sends formatted monitoring event data via the UDP socket connection to the CSM agent endpoint
     *
     * @param string $eventData
     * @return int
     */
    protected function sendEventData($eventData)
    {
        $socket = $this->prepareSocket();
        $result = socket_write($socket, $eventData, strlen($eventData));
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
    protected function serializeEventData(array $eventData)
    {
        if (!isset($this->dataFormat)) {
            throw new ClientSideMonitoringException("Classes extending AbstractMonitoringMiddleware 
                must set 'dataFormat' property.");
        }
        foreach ($eventData as $key => $datum) {
            if (!empty($this->dataFormat[$key]['maxLength']) && is_int($this->dataFormat[$key]['maxLength'])) {
                $eventData[$key] = substr($datum, 0, $this->dataFormat[$key]['maxLength']);
            }
        }
        return json_encode($eventData);
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
     * Returns $eventData array with information from the request and command.
     *
     * @param CommandInterface $cmd
     * @param RequestInterface $request
     * @return array
     */
    abstract protected function populateRequestEventData(CommandInterface $cmd, RequestInterface $request);


    /**
     * Returns $eventData array with information from the response, including the calculation
     * for attempt latency
     *
     * @param array $eventData
     * @param ResultInterface $result
     * @return array
     */
    abstract protected function populateResponseEventData(array $eventData, ResultInterface $result);

}