<?php
namespace Aws\Common\Api\Serializer;

use Aws\Common\Api\Service;
use GuzzleHttp\Command\CommandTransaction;

/**
 * Serializes a query protocol request.
 * @internal
 */
class QuerySerializer
{
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

    public function __invoke(CommandTransaction $trans)
    {
        /** @var \Aws\AwsCommandInterface $command */
        $command =  $trans->command;
        $api = $command->getApi();
        $operation = $api->getOperation($command->getName());

        $body = [
            'Action'  => $command->getName(),
            'Version' => $api->getMetadata('apiVersion')
        ];

        $params = $command->toArray();
        // Only build up the parameters when there are parameters to build
        if ($params) {
            $body += call_user_func(
                $this->paramBuilder,
                $operation->getInput(),
                $params
            );
        }

        return $trans->client->createRequest(
            'POST',
            $this->endpoint,
            ['body' => $body, 'config' => ['command' => $command]]
        );
    }
}
