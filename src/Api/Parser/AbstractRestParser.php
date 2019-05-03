<?php
namespace Aws\Api\Parser;

use Aws\Api\DateTimeResult;
use Aws\Api\Shape;
use Aws\Api\StructureShape;
use Aws\Result;
use Aws\CommandInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
abstract class AbstractRestParser extends AbstractParser
{
    use MetadataParserTrait;
    use PayloadParserTrait;

    /**
     * Parses a payload from a response.
     *
     * @param ResponseInterface $response Response to parse.
     * @param StructureShape    $member   Member to parse
     * @param array             $result   Result value
     *
     * @return mixed
     */
    abstract protected function payload(
        ResponseInterface $response,
        StructureShape $member,
        array &$result
    );

    public function __invoke(
        CommandInterface $command,
        ResponseInterface $response
    ) {
        $output = $this->api->getOperation($command->getName())->getOutput();
        $result = [];

        if ($payload = $output['payload']) {
            $this->extractPayload($payload, $output, $response, $result);
        }

        foreach ($output->getMembers() as $name => $member) {
            switch ($member['location']) {
                case 'header':
                    $this->extractHeader($name, $member, $response, $result);
                    break;
                case 'headers':
                    $this->extractHeaders($name, $member, $response, $result);
                    break;
                case 'statusCode':
                    $this->extractStatus($name, $response, $result);
                    break;
            }
        }

        if (!$payload
            && $response->getBody()->getSize() > 0
            && count($output->getMembers()) > 0
        ) {
            // if no payload was found, then parse the contents of the body
            $this->payload($response, $output, $result);
        }

        return new Result($result);
    }

    private function extractPayload(
        $payload,
        StructureShape $output,
        ResponseInterface $response,
        array &$result
    ) {
        $member = $output->getMember($payload);

        if (!empty($member['eventstream'])) {
            $result[$payload] = new EventParsingIterator(
                $response->getBody(),
                $member,
                $this
            );
        } else if ($member instanceof StructureShape) {
            // Structure members parse top-level data into a specific key.
            $result[$payload] = [];
            $this->payload($response, $member, $result[$payload]);
        } else {
            // Streaming data is just the stream from the response body.
            $result[$payload] = $response->getBody();
        }
    }
}
