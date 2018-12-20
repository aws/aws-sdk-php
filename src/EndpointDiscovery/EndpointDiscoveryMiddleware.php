<?php
namespace Aws\EndpointDiscovery;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Command;
use Aws\CommandInterface;
use Aws\Credentials\CredentialsInterface;
use Aws\LruArrayCache;
use Aws\Sdk;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

class EndpointDiscoveryMiddleware
{
    private static $cache;

    private $cacheKey;
    private $client;
    private $config;
    private $credentials;
    private $endpointOperation;
    private $nextHandler;
    private $service;

    public static function wrap(
        $client,
        $credentials,
        $service,
        $config
    ) {
        return function (callable $handler) use (
            $client,
            $credentials,
            $service,
            $config
        ) {
            return new static(
                $handler,
                $client,
                $credentials,
                $service,
                $config
            );
        };
    }

    public function __construct(
        callable $handler,
        AwsClient $client,
        $credentials,
        Service $service,
        $config
    ) {
        $this->nextHandler = $handler;
        $this->client = $client;
        $this->credentials = $credentials;
        $this->service = $service;
        $this->config = $config;
    }

    public function __invoke(CommandInterface $cmd, RequestInterface $request)
    {
        $operation = $this->service->getOperation($cmd->getName())->toArray();

        if (isset($operation['endpointdiscovery'])) {
            // Parse model
            $inputShape = $this->service->getShapeMap()->resolve($operation['input'])->toArray();
            $identifiers = [];
            foreach ($inputShape['members'] as $key => $member) {
                if (!empty($member['endpointdiscoveryid'])) {
                    $identifiers[] = $key;
                }
            }

            if (!isset($this->cacheKey)) {
                $this->cacheKey = $this->getCacheKey(
                    $this->credentials()->wait(),
                    $cmd,
                    $identifiers
                );
            }

            // Check/create cache
            if (!isset(self::$cache)) {
                self::$cache = new LruArrayCache();
            }

            if (self::$cache->get($this->cacheKey)) {

            }

            // Retrieve endpoints
            if (empty($this->endpointOperation)) {
                foreach ($this->service->getOperations() as $op) {
                    if (isset($op['endpointoperation'])) {
                        $this->endpointOperation = $op->toArray()['name'];
                        break;
                    }
                }
            }

            $name = $this->service->getServiceName();
            $sdk = new Sdk;
            $client = $sdk->createClient($name, $this->clientConfig);
            $params = [];
            if (!empty($identifiers)) {
                $params['Operation'] = $operation['name'];
                $params['Identifiers'] = [];
                foreach($identifiers as $identifier) {
                    $params['Identifiers'][$identifier] = $cmd[$identifier];
                }
            }
            var_dump($params);
            $discCmd = $client->getCommand($this->endpointOperation, $params);

            try {
                $result = $client->execute($discCmd);
                if (isset($result['Endpoints'])) {
                    $endpointData = [];
                    foreach ($result['Endpoints'] as $datum) {
                        $uri = new Uri($datum['Address']);
                        $endpoint = $uri->getHost() . $uri->getPath();
                        $endpointData[$endpoint] = time()
                            + ($datum['CachePeriodInMinutes'] * 60);
                    }
                    $endpointList = new EndpointList($endpointData);
                    self::$cache->set($this->cacheKey, $endpointList);
                }

            } catch (\Exception $e) {

            }

            // Modify request
            $endpointList = self::$cache->get($this->cacheKey);
            var_dump($endpointList->getActive());
            $uri = $request->getUri()->withHost($endpointList->getActive())->withScheme('http');
            $request = $request->withUri($uri);
        }

        $nextHandler = $this->nextHandler;

        var_dump($cmd->toArray());
//        $cmd['Sdk'] = 'modified';
        return $nextHandler($cmd, $request);
    }


    private function getCacheKey(
        CredentialsInterface $creds,
        CommandInterface $cmd,
        array $identifiers)
    {
        $key = $creds->getAccessKeyId();
        if (!empty($identifiers)) {
            $key .= '_' . $cmd->getName();
            foreach ($identifiers as $identifier) {
                $key .= "_{$cmd[$identifier]}";
            }
        }

        return $key;
    }
}