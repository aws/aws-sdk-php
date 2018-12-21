<?php
namespace Aws\EndpointDiscovery;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\CommandInterface;
use Aws\Credentials\CredentialsInterface;
use Aws\Exception\AwsException;
use Aws\Exception\UnresolvedEndpointException;
use Aws\LruArrayCache;
use Aws\Middleware;
use Psr\Http\Message\RequestInterface;

class EndpointDiscoveryMiddleware
{
    private static $cache;

    private $args;
    private $client;
    private $config;
    private $credentials;
    private $nextHandler;
    private $service;

    public static function wrap(
        $client,
        $args,
        $credentials,
        $service,
        $config
    ) {
        return function (callable $handler) use (
            $client,
            $args,
            $credentials,
            $service,
            $config
        ) {
            return new static(
                $handler,
                $client,
                $args,
                $credentials,
                $service,
                $config
            );
        };
    }

    public function __construct(
        callable $handler,
        AwsClient $client,
        array $args,
        callable $credentials,
        Service $service,
        $config
    ) {
        $this->nextHandler = $handler;
        $this->client = $client;
        $this->args = $args;
        $this->credentials = $credentials;
        $this->service = $service;
        $this->config = $config;
    }

    public function __invoke(CommandInterface $cmd, RequestInterface $request)
    {
        // Endpoint discovery disabled if custom endpoint is set
        if (!isset($args['endpoint'])) {

            $operation = $this->service->getOperation($cmd->getName())->toArray();

            // Continue only if endpointdiscovery trait is set
            if (isset($operation['endpointdiscovery'])) {

                // Continue only if required by operation or enabled by config
                if ( !empty($operation['endpointdiscovery']['required'])
                    || ConfigurationProvider::unwrap($this->config)->isEnabled()
                ) {
                    if (isset($operation['endpointoperation'])) {
                        throw new UnresolvedEndpointException('This operation is contradictorily marked both as using endpoint discovery and being the endpoint discovery operation. Please verify the accuracy of your model files.');
                    }

                    // Get identifiers
                    $inputShape = $this->service->getShapeMap()->resolve($operation['input'])->toArray();
                    $identifiers = [];
                    foreach ($inputShape['members'] as $key => $member) {
                        if (!empty($member['endpointdiscoveryid'])) {
                            $identifiers[] = $key;
                        }
                    }

                    $credentials = $this->credentials;
                    $cacheKey = $this->getCacheKey(
                        $credentials()->wait(),
                        $cmd,
                        $identifiers
                    );

                    // Check/create cache
                    if (!isset(self::$cache)) {
                        self::$cache = new LruArrayCache();
                    }

                    $endpointList = self::$cache->get($cacheKey);

                    if (!is_null($endpointList)) {
                        $endpoint = $endpointList->getActive();
                    }

                    // Retrieve endpoints if there is no active endpoint
                    if (empty($endpoint)) {

                        $discCmd = $this->getDiscoveryCommand($cmd, $identifiers);

                        try {
                            $result = $this->client->execute($discCmd);
                            if (isset($result['Endpoints'])) {
                                $endpointData = [];
                                foreach ($result['Endpoints'] as $datum) {
                                    $endpointData[$datum['Address']] = time()
                                        + ($datum['CachePeriodInMinutes'] * 60);
                                }
                                $endpointList = new EndpointList($endpointData);
                                self::$cache->set($cacheKey, $endpointList);
                            }

                            $endpointList = self::$cache->get($cacheKey);

                            $endpoint = $endpointList->getActive();

                        } catch (\Exception $e) {
                            throw $e;
                        }
                    }

                    // Modify request
                    $parsed = $this->parseEndpoint($endpoint);
                    $request = $request
                        ->withUri($request->getUri()
                            ->withHost($parsed['host'])
                            ->withPath($parsed['path'])
                        )
                        ->withHeader(
                            'User-Agent',
                            $request->getHeader('User-Agent')[0] . ' endpoint-discovery'
                        );
                }
            }
        }

        $nextHandler = $this->nextHandler;

        return $nextHandler($cmd, $request);
    }

    private function getCacheKey(
        CredentialsInterface $creds,
        CommandInterface $cmd,
        array $identifiers
    ) {
        $key = $creds->getAccessKeyId();
        if (!empty($identifiers)) {
            $key .= '_' . $cmd->getName();
            foreach ($identifiers as $identifier) {
                $key .= "_{$cmd[$identifier]}";
            }
        }

        return $key;
    }

    private function getDiscoveryCommand(CommandInterface $cmd, array $identifiers)
    {
        foreach ($this->service->getOperations() as $op) {
            if (isset($op['endpointoperation'])) {
                $endpointOperation = $op->toArray()['name'];
                break;
            }
        }

        if (!isset($endpointOperation)) {
            throw new AwsException('This command is set to use endpoint discovery, but no endpoint discovery operation was found. Please verify the accuracy of your model files.', $cmd);
        }

        $params = [];
        if (!empty($identifiers)) {
            $params['Operation'] = $cmd->getName();
            $params['Identifiers'] = [];
            foreach($identifiers as $identifier) {
                $params['Identifiers'][$identifier] = $cmd[$identifier];
            }
        }
        $command = $this->client->getCommand($endpointOperation, $params);
        $command->getHandlerList()->appendBuild(
            Middleware::mapRequest(function (RequestInterface $r) {
                return $r->withHeader('x-amz-api-version', $this->service->getApiVersion());
            }),
            'x-amz-api-version-header'
        );

        return $command;
    }

    /**
     * Parses an endpoint returned from the discovery API into an array with
     * 'host' and 'path' keys.
     *
     * @param $endpoint
     * @return array
     */
    private function parseEndpoint($endpoint)
    {
        $parsed = parse_url($endpoint);

        // parse_url() will correctly parse full URIs with schemes
        if (isset($parsed['host'])) {
            return $parsed;
        }

        // parse_url() will put host & path in 'path' if scheme is not provided
        if (isset($parsed['path'])) {
            $split = explode('/', $parsed['path'], 2);
            $parsed['host'] = $split[0];
            if (isset($split[1])) {
                $parsed['path'] = $split[1];
            } else {
                $parsed['path'] = '';
            }
            return $parsed;
        }

        throw new UnresolvedEndpointException("Endpoint '{$endpoint}' returned from the endpoint discovery operation is invalid.");
    }
}