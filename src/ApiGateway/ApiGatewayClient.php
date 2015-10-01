<?php
namespace Aws\ApiGateway;

use Aws\AwsClient;
use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **AWS API Gateway** service.
 */
class ApiGatewayClient extends AwsClient
{
    public function __construct(array $args)
    {
        parent::__construct($args);
        $stack = $this->getHandlerList();
        $stack->appendBuild([__CLASS__, '_add_accept_header']);
    }

    public static function _add_accept_header(callable $handler)
    {
        return function (
            CommandInterface $command,
            RequestInterface $request
        ) use ($handler) {
            $request = $request->withHeader('Accept', 'application/json');

            return $handler($command, $request);
        };
    }
}
