<?php
namespace Aws\Api\Serializer;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Service;
use Aws\Api\Operation;
use Aws\Api\Shape;
use Aws\Api\StructureShape;
use Aws\Api\TimestampShape;
use Aws\CommandInterface;
use Aws\EndpointV2\EndpointV2SerializerTrait;
use Aws\EndpointV2\Ruleset\RulesetEndpoint;
use DateTimeInterface;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\UriResolver;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Serializes HTTP locations like header, uri, payload, etc...
 * @internal
 */
abstract class RestSerializer
{
    use EndpointV2SerializerTrait;

    private static array $excludeContentType = [
        's3' => true,
        'glacier' => true
    ];

    /** @var Service */
    private Service $api;

    /** @var Uri */
    private $endpoint;

    /** @var bool */
    private $isUseEndpointV2;

    /**
     * @param Service $api      Service API description
     * @param string  $endpoint Endpoint to connect to
     */
    public function __construct(Service $api, $endpoint)
    {
        $this->api = $api;
        $this->endpoint = Psr7\Utils::uriFor($endpoint);
    }

    /**
     * @param CommandInterface $command Command to serialize into a request.
     * @param null $endpoint
     * @return RequestInterface
     */
    public function __invoke(
        CommandInterface $command,
        $endpoint = null
    )
    {
        $operation = $this->api->getOperation($command->getName());
        $commandArgs = $command->toArray();
        $opts = $this->serialize($operation, $commandArgs);
        $headers = $opts['headers'] ?? [];

        if ($endpoint instanceof RulesetEndpoint) {
            $this->isUseEndpointV2 = true;
            $this->setEndpointV2RequestOptions($endpoint, $headers);
        }

        $uri = $this->buildEndpoint($operation, $commandArgs, $opts);

        return new Request(
            $operation['http']['method'],
            $uri,
            $headers,
            $opts['body'] ?? null
        );
    }

    /**
     * Modifies a hash of request options for a payload body.
     *
     * @param StructureShape   $member  Member to serialize
     * @param array            $value   Value to serialize
     * @param array            $opts    Request options to modify.
     */
    abstract protected function payload(
        StructureShape $member,
        array $value,
        array &$opts
    );

    private function serialize(Operation $operation, array $args)
    {
        $opts = [];
        $input = $operation->getInput();

        // Apply the payload trait if present
        if ($payload = $input['payload']) {
            $this->applyPayload($input, $payload, $args, $opts);
        }

        foreach ($args as $name => $value) {
            if ($input->hasMember($name)) {
                $member = $input->getMember($name);
                $location = $member['location'];
                if (!$payload && !$location) {
                    $bodyMembers[$name] = $value;
                } elseif ($location === 'header') {
                    $this->applyHeader($name, $member, $value, $opts);
                } elseif ($location === 'querystring') {
                    $this->applyQuery($name, $member, $value, $opts);
                } elseif ($location === 'headers') {
                    $this->applyHeaderMap($name, $member, $value, $opts);
                }
            }
        }

        if (isset($bodyMembers)) {
            $this->payload($input, $bodyMembers, $opts);
        } else if (!isset($opts['body']) && $this->hasPayloadParam($input, $payload)) {
            $this->payload($input, [], $opts);
        }

        return $opts;
    }

    private function applyPayload(StructureShape $input, $name, array $args, array &$opts)
    {
        if (!isset($args[$name])) {
            return;
        }

        $m = $input->getMember($name);

        $type = $m->getType();
        if ($m['streaming'] ||
           ($type === 'string' || $type === 'blob')
        ) {
            // This path skips setting the content-type header usually done in
            // RestJsonSerializer and RestXmlSerializer.certain S3 and glacier
            // operations determine content type in Middleware::ContentType()
            if (!isset(self::$excludeContentType[$this->api->getServiceName()])) {
                switch ($type) {
                    case 'string':
                        $opts['headers']['Content-Type'] = 'text/plain';
                        break;
                    case 'blob':
                        $opts['headers']['Content-Type'] = 'application/octet-stream';
                        break;
                }
            }

            $body = $args[$name];
            if (!$m['streaming'] && is_string($body)) {
                $opts['headers']['Content-Length'] = strlen($body);
            }

            // Streaming bodies or payloads that are strings are
            // always just a stream of data.
            $opts['body'] = Psr7\Utils::streamFor($body);
            return;
        }

        // Payload members have special rules for locationName handling
        // they should use their member-level locationName
        // if it differs from the member name.
        $type = $m->getType();
        if ($type === 'structure') {
            // Mark this as a payload member with its member name
            $m['__payloadMemberName'] = $name;
        }

        $this->payload($m, $args[$name], $opts);
    }

    private function applyHeader($name, Shape $member, $value, array &$opts)
    {
        // Handle lists by recursively applying header logic to each element
        if ($member instanceof ListShape) {
            $listMember = $member->getMember();
            $headerValues = [];

            foreach ($value as $listValue) {
                $tempOpts = ['headers' => []];
                $this->applyHeader('temp', $listMember, $listValue, $tempOpts);
                $convertedValue = $tempOpts['headers']['temp'];
                $headerValues[] = $convertedValue;
            }

            $value = $headerValues;
        } elseif (!is_null($value)) {
            switch ($member->getType()) {
                case 'timestamp':
                    $timestampFormat = $member['timestampFormat'] ?? 'rfc822';
                    $value = $this->formatTimestamp($value, $timestampFormat);
                    break;
                case 'boolean':
                    $value = $this->formatBoolean($value);
                    break;
            }
        }

        if ($member['jsonvalue']) {
            $value = json_encode($value);
            if (empty($value) && JSON_ERROR_NONE !== json_last_error()) {
                throw new \InvalidArgumentException('Unable to encode the provided value'
                    . ' with \'json_encode\'. ' . json_last_error_msg());
            }

            $value = base64_encode($value);
        }

        $opts['headers'][$member['locationName'] ?: $name] = $value;
    }

    /**
     * Note: This is currently only present in the Amazon S3 model.
     */
    private function applyHeaderMap($name, Shape $member, array $value, array &$opts)
    {
        $prefix = $member['locationName'];
        foreach ($value as $k => $v) {
            $opts['headers'][$prefix . $k] = $v;
        }
    }

    private function applyQuery($name, Shape $member, $value, array &$opts)
    {
        if ($member instanceof MapShape) {
            $opts['query'] = isset($opts['query']) && is_array($opts['query'])
                ? $opts['query'] + $value
                : $value;
        } elseif ($member instanceof ListShape) {
            $listMember = $member->getMember();
            $paramName = $member['locationName'] ?: $name;

            foreach ($value as $listValue) {
                // Recursively call applyQuery for each list element
                $tempOpts = ['query' => []];
                $this->applyQuery('temp', $listMember, $listValue, $tempOpts);
                $opts['query'][$paramName][] = $tempOpts['query']['temp'];
            }
        } elseif (!is_null($value)) {
            switch ($member->getType()) {
                case 'timestamp':
                    $timestampFormat = $member['timestampFormat'] ?? 'iso8601';
                    $value = $this->formatTimestamp($value, $timestampFormat);
                    break;
                case 'boolean':
                    $value = $this->formatBoolean($value);
                    break;
            }

            $opts['query'][$member['locationName'] ?: $name] = $value;
        }
    }

    private function buildEndpoint(Operation $operation, array $args, array $opts)
    {
        $serviceName = $this->api->getServiceName();
        // Create an associative array of variable definitions used in expansions
        $varDefinitions = $this->getVarDefinitions($operation, $args);

        $relative = preg_replace_callback(
            '/\{([^\}]+)\}/',
            static function (array $matches) use ($varDefinitions) {
                $isGreedy = str_ends_with($matches[1], '+');
                $k = $isGreedy ? substr($matches[1], 0, -1) : $matches[1];
                if (!isset($varDefinitions[$k])) {
                    return '';
                }

                if ($isGreedy) {
                    return str_replace('%2F', '/', rawurlencode($varDefinitions[$k]));
                }

                return rawurlencode($varDefinitions[$k]);
            },
            $operation['http']['requestUri']
        );

        // Add the query string variables or appending to one if needed.
        if (!empty($opts['query'])) {
           $relative = $this->appendQuery($opts['query'], $relative);
        }

        $path = $this->endpoint->getPath();

        if ($this->isUseEndpointV2 && $serviceName === 's3') {
            if (substr($path, -1) === '/' && $relative[0] === '/') {
                $path = rtrim($path, '/');
            }
            $relative = $path . $relative;

            if (strpos($relative, '../') !== false
                || substr($relative, -2) === '..'
            ) {
                if ($relative[0] !== '/') {
                    $relative = '/' . $relative;
                }

                return new Uri($this->endpoint->withPath('') . $relative);
            }
        }

        if (((!empty($relative) && $relative !== '/')
            && !$this->isUseEndpointV2)
            || (isset($serviceName) && str_starts_with($serviceName, 'geo-'))
        ) {
            $this->normalizePath($path);
        }

        // If endpoint has path, remove leading '/' to preserve URI resolution.
        if ($path && $relative[0] === '/') {
            $relative = substr($relative, 1);
        }

        //Append path to endpoint when leading '//...'
        // present as uri cannot be properly resolved
        if ($this->isUseEndpointV2 && strpos($relative, '//') === 0) {
            return new Uri($this->endpoint . $relative);
        }

        // Expand path place holders using Amazon's slightly different URI
        // template syntax.
        return UriResolver::resolve($this->endpoint, new Uri($relative));
    }

    /**
     * @param StructureShape $input
     */
    private function hasPayloadParam(StructureShape $input, $payload)
    {
        if ($payload) {
            $potentiallyEmptyTypes = ['blob','string'];
            if ($this->api->getProtocol() === 'rest-xml') {
                $potentiallyEmptyTypes[] = 'structure';
            }

            $payloadMember = $input->getMember($payload);
            //unions may also be empty/unset
            if (!empty($payloadMember['union'])
                || in_array($payloadMember['type'], $potentiallyEmptyTypes)
            ) {
                return false;
            }
        }

        foreach ($input->getMembers() as $member) {
            if (!isset($member['location'])) {
                return true;
            }
        }

        return false;
    }

    private function appendQuery($query, $endpoint)
    {
        $append = Psr7\Query::build($query);
        return $endpoint .= strpos($endpoint, '?') !== false ? "&{$append}" : "?{$append}";
    }

    private function getVarDefinitions($command, $args)
    {
        $varDefinitions = [];

        foreach ($command->getInput()->getMembers() as $name => $member) {
            if ($member['location'] === 'uri') {
                $value = $args[$name] ?? null;
                if (!is_null($value)) {
                    switch ($member->getType()) {
                        case 'timestamp':
                            $timestampFormat = $member['timestampFormat'] ?? 'iso8601';
                            $value = $this->formatTimestamp($value, $timestampFormat);
                            break;
                        case 'boolean':
                            $value = $this->formatBoolean($value);
                            break;
                    }
                }

                $varDefinitions[$member['locationName'] ?: $name] = $value;
            }
        }

        return $varDefinitions;
    }

    /**
     * Appends trailing slash to non-empty paths with at least one segment
     * to ensure proper URI resolution
     *
     * @param string $path
     *
     * @return void
     */
    private function normalizePath(string $path): void
    {
        if (!empty($path) && $path !== '/' && substr($path, -1) !== '/') {
            $this->endpoint = $this->endpoint->withPath($path . '/');
        }
    }

    /**
     * @param DateTimeInterface|string|int $value
     * @param string $timestampFormat
     *
     * @return string
     */
    private function formatTimestamp(
        DateTimeInterface|string|int $value,
        string $timestampFormat
    ): string
    {
        return TimestampShape::format($value, $timestampFormat);
    }

    /**
     * @param $value
     *
     * @return string
     */
    private function formatBoolean($value): string
    {
        return $value ? 'true' : 'false';
    }
}
