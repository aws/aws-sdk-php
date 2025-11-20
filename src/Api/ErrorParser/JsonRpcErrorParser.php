<?php
namespace Aws\Api\ErrorParser;

use Aws\Api\Parser\JsonParser;
use Aws\Api\Service;
use Aws\CommandInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Parsers JSON-RPC errors.
 */
class JsonRpcErrorParser extends AbstractErrorParser
{
    use JsonParserTrait;

    private $parser;

    public function __construct(?Service $api = null, ?JsonParser $parser = null)
    {
        parent::__construct($api);
        $this->parser = $parser ?: new JsonParser();
    }

    public function __invoke(
        ResponseInterface $response,
        ?CommandInterface $command = null
    ) {
        $data = $this->genericHandler($response);

        // Make the casing consistent across services.
        $parsed = $data['parsed'] ?? null;
        if ($parsed) {
            $parsed = array_change_key_case($data['parsed']);
        }

        if (isset($parsed['__type'])) {
            if (!isset($data['code'])) {
                $parts = explode('#', $parsed['__type']);
                $data['code'] = $parts[1] ?? $parts[0];
            }

            $data['message'] = $parsed['message'] ?? null;
        }

        $this->populateShape($data, $response, $command);

        return $data;
    }
}
