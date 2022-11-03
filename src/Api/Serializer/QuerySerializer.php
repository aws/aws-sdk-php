<?php
namespace Aws\Api\Serializer;

use Aws\Api\Service;
use Aws\CommandInterface;
use Aws\EndpointV2\EndpointProvider;
use Aws\EndpointV2\EndpointV2SerializerTrait;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

/**
 * Serializes a query protocol request.
 * @internal
 */
class QuerySerializer
{
    use EndpointV2SerializerTrait;

    private $endpoint;
    private $api;
    private $paramBuilder;

    public function __construct(
        Service $api,
        $endpoint,
        callable $paramBuilder = null
    ) {
        $this->api = $api;
        $this->endpoint = $endpoint;
        $this->paramBuilder = $paramBuilder ?: new QueryParamBuilder();
    }

    /**
     * When invoked with an AWS command, returns a serialization array
     * containing "method", "uri", "headers", and "body" key value pairs.
     *
     * @param CommandInterface $command
     * @param null $endpointProvider
     * @param array|null $clientArgs
     *
     * @return RequestInterface
     */
    public function __invoke(
        CommandInterface $command,
        $endpointProvider = null,
        array $clientArgs = null
    )
    {
        $operationName = $command->getName();
        $operation = $this->api->getOperation($operationName);
        $body = [
            'Action'  => $command->getName(),
            'Version' => $this->api->getMetadata('apiVersion')
        ];
        $commandArgs = $command->toArray();

        // Only build up the parameters when there are parameters to build
        if ($commandArgs) {
            $body += call_user_func(
                $this->paramBuilder,
                $operation->getInput(),
                $commandArgs
            );
        }
        $body = http_build_query($body, '', '&', PHP_QUERY_RFC3986);
        $headers = [
            'Content-Length' => strlen($body),
            'Content-Type'   => 'application/x-www-form-urlencoded'
        ];

        if ($endpointProvider instanceof EndpointProvider) {
            $providerArgs = $this->resolveProviderArgs(
                $operation,
                $endpointProvider,
                $commandArgs,
                $clientArgs,
                $operationName
            );
            $endpoint = $endpointProvider->resolveEndpoint($providerArgs);
            $this->endpoint = $endpoint->getUrl();
            $this->applyAuthSchemeToCommand($endpoint, $command);
            $this->applyHeaders($endpoint, $headers);
        }

        return new Request(
            'POST',
            $this->endpoint,
            $headers,
            $body
        );
    }
}
