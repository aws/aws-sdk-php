<?php
namespace Aws;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\StructureShape;
use Aws\Exception\AwsException;
use GuzzleHttp\Promise\RejectedPromise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Traces state changes between middlewares.
 */
class TraceMiddleware
{
    private $prevOutput;
    private $prevInput;
    private $config;
    /** @var Service */
    private $service;
    /** @var array Memoized per operation and direction: has sensitive data, and sensitive bindings */
    private $sensitiveOps = [];

    private static $authHeaders = [
        'X-Amz-Security-Token' => '[TOKEN]',
    ];

    private static $authStrings = [
        // S3Signature
        '/AWSAccessKeyId=[A-Z0-9]{20}&/i' => 'AWSAccessKeyId=[KEY]&',
        // SignatureV4 Signature and S3Signature
        '/Signature=.+/i' => 'Signature=[SIGNATURE]',
        // SignatureV4 access key ID
        '/Credential=[A-Z0-9]{20}\//i' => 'Credential=[KEY]/',
        // S3 signatures
        '/AWS [A-Z0-9]{20}:.+/' => 'AWS AKI[KEY]:[SIGNATURE]',
        // STS Presigned URLs
        '/X-Amz-Security-Token=[^&]+/i' => 'X-Amz-Security-Token=[TOKEN]',
        // Crypto *Stream Keys
        '/\["key.{27,36}Stream.{9}\]=>\s+.{7}\d{2}\) "\X{16,64}"/U' => '["key":[CONTENT KEY]]',
    ];

    /**
     * Configuration array can contain the following key value pairs.
     *
     * - logfn: (callable) Function that is invoked with log messages. By
     *   default, PHP's "echo" function will be utilized.
     * - stream_size: (int) When the size of a stream is greater than this
     *   number, the stream data will not be logged. Set to "0" to not log any
     *   stream data.
     * - scrub_auth: (bool) Set to false to disable the scrubbing of auth data
     *   from the logged messages.
     * - http: (bool) Set to false to disable the "debug" feature of lower
     *   level HTTP adapters (e.g., verbose curl output).
     * - auth_strings: (array) A mapping of authentication string regular
     *   expressions to scrubbed strings. These mappings are passed directly to
     *   preg_replace (e.g., preg_replace($key, $value, $debugOutput) if
     *   "scrub_auth" is set to true.
     * - auth_headers: (array) A mapping of header names known to contain
     *   sensitive data to what the scrubbed value should be. The value of any
     *   headers contained in this array will be replaced with the if
     *   "scrub_auth" is set to true.
     */
    public function __construct(array $config = [], ?Service $service = null)
    {
        $this->config = $config + [
            'logfn'        => function ($value) { echo $value; },
            'stream_size'  => 524288,
            'scrub_auth'   => true,
            'http'         => true,
            'auth_strings' => [],
            'auth_headers' => [],
        ];

        $this->config['auth_strings'] += self::$authStrings;
        $this->config['auth_headers'] += self::$authHeaders;
        $this->service = $service;
    }

    public function __invoke($step, $name)
    {
        $this->prevOutput = $this->prevInput = [];

        return function (callable $next) use ($step, $name) {
            return function (
                CommandInterface $command,
                $request = null
            ) use ($next, $step, $name) {
                $this->createHttpDebug($command);
                $start = microtime(true);
                $this->stepInput([
                    'step'    => $step,
                    'name'    => $name,
                    'request' => $this->requestArray(
                        $request,
                        $command->getName()
                    ),
                    'command' => $this->commandArray($command)
                ]);

                return $next($command, $request)->then(
                    function ($value) use ($step, $name, $command, $start) {
                        $this->flushHttpDebug($command, !empty($command['@http']['stream']));
                        $this->stepOutput($start, [
                            'step'   => $step,
                            'name'   => $name,
                            'result' => $this->resultArray(
                                $value,
                                $this->operationShape(
                                    $command->getName(),
                                    'output'
                                ),
                                $command->getName()
                            ),
                            'error'  => null
                        ]);
                        return $value;
                    },
                    function ($reason) use ($step, $name, $start, $command) {
                        $this->flushHttpDebug($command);
                        $this->stepOutput($start, [
                            'step'   => $step,
                            'name'   => $name,
                            'result' => null,
                            'error'  => $this->exceptionArray($reason)
                        ]);
                        return new RejectedPromise($reason);
                    }
                );
            };
        };
    }

    private function stepInput($entry)
    {
        static $keys = ['command', 'request'];
        $this->compareStep($this->prevInput, $entry, '-> Entering', $keys);
        $this->write("\n");
        $this->prevInput = $entry;
    }

    private function stepOutput($start, $entry)
    {
        static $keys = ['result', 'error'];
        $this->compareStep($this->prevOutput, $entry, '<- Leaving', $keys);
        $totalTime = microtime(true) - $start;
        $this->write("  Inclusive step time: " . $totalTime . "\n\n");
        $this->prevOutput = $entry;
    }

    private function compareStep(array $a, array $b, $title, array $keys)
    {
        $changes = [];
        foreach ($keys as $key) {
            $av = isset($a[$key]) ? $a[$key] : null;
            $bv = isset($b[$key]) ? $b[$key] : null;
            $this->compareArray($av, $bv, $key, $changes);
        }
        $str = "\n{$title} step {$b['step']}, name '{$b['name']}'";
        $str .= "\n" . str_repeat('-', strlen($str) - 1) . "\n\n  ";
        $str .= $changes
            ? implode("\n  ", str_replace("\n", "\n  ", $changes))
            : 'no changes';
        $this->write($str . "\n");
    }

    private function commandArray(CommandInterface $cmd)
    {
        return [
            'instance' => spl_object_id($cmd),
            'name'     => $cmd->getName(),
            'params'   => $this->redactValue(
                $cmd->toArray(),
                $this->operationShape($cmd->getName(), 'input')
            )
        ];
    }

    private function requestArray($request = null, ?string $opName = null)
    {
        return !$request instanceof RequestInterface
            ? []
            : array_filter([
                'instance' => spl_object_id($request),
                'method'   => $request->getMethod(),
                'headers'  => $this->redactHeaders(
                    $request->getHeaders(),
                    $opName,
                    'input'
                ),
                'body'     => $this->bodyStr(
                    $request->getBody(),
                    $opName,
                    'input'
                ),
                'scheme'   => $request->getUri()->getScheme(),
                'port'     => $request->getUri()->getPort(),
                'path'     => $this->redactPath($request->getUri()->getPath(), $opName),
                'query'    => $this->redactQuery($request->getUri()->getQuery(), $opName),
        ]);
    }

    private function responseArray(
        ?ResponseInterface $response = null,
        ?string $opName = null
    ) {
        return !$response ? [] : [
            'instance'   => spl_object_id($response),
            'statusCode' => $response->getStatusCode(),
            'headers'    => $this->redactHeaders(
                $response->getHeaders(),
                $opName,
                'output'
            ),
            'body'       => $this->bodyStr(
                $response->getBody(),
                $opName,
                'output'
            )
        ];
    }

    private function resultArray(
        $value,
        ?Shape $shape = null,
        ?string $opName = null
    ) {
        if (!$value instanceof ResultInterface) {
            return $value;
        }

        $data = $this->redactValue($value->toArray(), $shape);
        $uri = $data['@metadata']['effectiveUri'] ?? null;
        if (is_string($uri)) {
            $data['@metadata']['effectiveUri'] = $this->redactUri($uri, $opName);
        }

        return [
            'instance' => spl_object_id($value),
            'data'     => $data,
        ];
    }

    private function exceptionArray($e)
    {
        if (!($e instanceof \Exception)) {
            return $e;
        }

        $result = [
            'instance'   => spl_object_id($e),
            'class'      => get_class($e),
            'message'    => $e->getMessage(),
            'file'       => $e->getFile(),
            'line'       => $e->getLine(),
            'trace'      => $e->getTraceAsString(),
        ];

        if ($e instanceof AwsException) {
            $opName = $e->getCommand()?->getName();
            $result += [
                'type'       => $e->getAwsErrorType(),
                'code'       => $e->getAwsErrorCode(),
                'requestId'  => $e->getAwsRequestId(),
                'statusCode' => $e->getStatusCode(),
                'result'     => $this->resultArray(
                    $e->getResult(),
                    $e->getAwsErrorShape(),
                    $opName
                ),
                'request'    => $this->requestArray($e->getRequest(), $opName),
                'response'   => $this->responseArray($e->getResponse(), $opName),
            ];
        }

        return $result;
    }

    private function compareArray($a, $b, $path, array &$diff)
    {
        if ($a === $b) {
            return;
        }

        if (is_array($a)) {
            $b = (array) $b;
            $keys = array_unique(array_merge(array_keys($a), array_keys($b)));
            foreach ($keys as $k) {
                if (!array_key_exists($k, $a)) {
                    $this->compareArray(null, $b[$k], "{$path}.{$k}", $diff);
                } elseif (!array_key_exists($k, $b)) {
                    $this->compareArray($a[$k], null, "{$path}.{$k}", $diff);
                } else {
                    $this->compareArray($a[$k], $b[$k], "{$path}.{$k}", $diff);
                }
            }
        } elseif ($a !== null && $b === null) {
            $diff[] = "{$path} was unset";
        } elseif ($a === null && $b !== null) {
            $diff[] = sprintf("%s was set to %s", $path, $this->str($b));
        } else {
            $diff[] = sprintf("%s changed from %s to %s", $path, $this->str($a), $this->str($b));
        }
    }

    private function str($value)
    {
        if (is_scalar($value)) {
            return (string) $value;
        }

        if ($value instanceof \Exception) {
            $value = $this->exceptionArray($value);
        }

        ob_start();
        var_dump($value);
        return ob_get_clean();
    }

    private function streamStr(StreamInterface $body)
    {
        return $body->getSize() < $this->config['stream_size']
            ? (string) $body
            : 'stream(size=' . $body->getSize() . ')';
    }

    private function createHttpDebug(CommandInterface $command)
    {
        if ($this->config['http'] && !isset($command['@http']['debug'])) {
            $command['@http']['debug'] = fopen('php://temp', 'w+');
        }
    }

    private function flushHttpDebug(CommandInterface $command, $deferClose = false)
    {
        if ($res = $command['@http']['debug'] ?? null) {
            if (is_resource($res)) {
                rewind($res);
                $this->write($this->redactWireHeaders(
                    stream_get_contents($res),
                    $command->getName()
                ));
                // Stream handlers retain this resource until the body closes.
                if (!$deferClose) {
                    fclose($res);
                }
            }
            $command['@http']['debug'] = null;
        }
    }

    private function write($value)
    {
        if ($this->config['scrub_auth']) {
            foreach ($this->config['auth_strings'] as $pattern => $replacement) {
                $value = preg_replace_callback(
                    $pattern,
                    function ($matches) use ($replacement) {
                        return $replacement;
                    },
                    $value
                );
            }
        }

        call_user_func($this->config['logfn'], $value);
    }

    private function redactHeaders(
        array $headers,
        ?string $opName = null,
        string $direction = 'input'
    ) {
        if ($this->config['scrub_auth']) {
            $headers = $this->config['auth_headers'] + $headers;
        }

        $sensitive = $this->sensitiveBindings($opName, $direction)['header'];
        foreach (array_keys($headers) as $name) {
            $lower = strtolower($name);
            if (isset($sensitive[$lower])) {
                $headers[$name] = $sensitive[$lower];
            }
        }

        return $headers;
    }

    private function redactQuery(string $query, ?string $opName): string
    {
        $sensitive = $this->sensitiveBindings($opName, 'input')['querystring'];
        if (!$sensitive || $query === '') {
            return $query;
        }

        $parts = explode('&', $query);
        foreach ($parts as $i => $part) {
            $name = rawurldecode(explode('=', $part, 2)[0]);
            if (isset($sensitive[$name])) {
                $parts[$i] = explode('=', $part, 2)[0] . '=' . $sensitive[$name];
            }
        }

        return implode('&', $parts);
    }

    private function redactPath(string $path, ?string $opName): string
    {
        return $this->sensitiveBindings($opName, 'input')['uri']
            ? '[REDACTED path]'
            : $path;
    }

    private function redactUri(string $uri, ?string $opName): string
    {
        $input = $this->sensitiveBindings($opName, 'input');
        if (!$input['querystring'] && !$input['uri']) {
            return $uri;
        }

        $parsed = new \GuzzleHttp\Psr7\Uri($uri);

        return (string) $parsed
            ->withPath($this->redactPath($parsed->getPath(), $opName))
            ->withQuery($this->redactQuery($parsed->getQuery(), $opName));
    }

    /**
     * Redacts sensitive header lines in the raw HTTP debug output.
     */
    private function redactWireHeaders(string $output, string $opName): string
    {
        $input = $this->sensitiveBindings($opName, 'input');
        if ($input['querystring'] || $input['uri']) {
            $output = preg_replace(
                '/^> ([A-Z]+) \S+ (HTTP\/\S+)/m',
                '> $1 [REDACTED target] $2',
                $output
            );
        }
        $headers = $input['header']
            + $this->sensitiveBindings($opName, 'output')['header'];
        foreach ($headers as $name => $placeholder) {
            $output = preg_replace(
                '/^([<>] )?(' . preg_quote($name, '/') . '):[^\r\n]*/mi',
                '$1$2: ' . $placeholder,
                $output
            );
        }

        return $output;
    }

    /**
     * Returns the operation's sensitive members bound to headers, query
     * parameters and URI labels, keyed by the name sent on the wire, with
     * their placeholders. Header names are lowercase.
     */
    private function sensitiveBindings(?string $opName, string $direction): array
    {
        $key = "{$opName}:{$direction}:bindings";
        if (isset($this->sensitiveOps[$key])) {
            return $this->sensitiveOps[$key];
        }

        $bindings = ['header' => [], 'querystring' => [], 'uri' => []];
        $shape = $this->operationShape($opName, $direction);
        if ($shape instanceof StructureShape) {
            foreach ($shape->getMembers() as $name => $member) {
                $location = $member['location'];
                if (isset($bindings[$location]) && $this->isSensitive($member)) {
                    $wireName = $member['locationName'] ?? $name;
                    if ($location === 'header') {
                        $wireName = strtolower($wireName);
                    }
                    $bindings[$location][$wireName] = $this->placeholder($member);
                }
            }
        }

        return $this->sensitiveOps[$key] = $bindings;
    }

    private function bodyStr(
        StreamInterface $body,
        ?string $opName,
        string $direction
    ) {
        if ($this->operationHasSensitive($opName, $direction)) {
            $size = $body->getSize();
            return '[REDACTED body, size=' . ($size ?? 'unknown') . ']';
        }

        return $this->streamStr($body);
    }

    /**
     * Returns the input or output shape of a modeled operation, or null when
     * there is no service or the command is not one of its operations.
     */
    private function operationShape(?string $name, string $direction): ?Shape
    {
        if (!$this->service
            || $name === null
            || !$this->service->hasOperation($name)
        ) {
            return null;
        }

        $operation = $this->service->getOperation($name);

        return $direction === 'input'
            ? $operation->getInput()
            : $operation->getOutput();
    }

    /**
     * Returns a copy of $value with every value whose modeled shape is
     * sensitive replaced by a placeholder. Keys the model does not define
     * are left unchanged.
     */
    private function redactValue(mixed $value, ?Shape $shape): mixed
    {
        if ($shape === null) {
            return $value;
        }

        if ($this->isSensitive($shape)) {
            return $this->placeholder($shape);
        }

        if (!is_array($value)) {
            return $value;
        }

        if ($shape instanceof StructureShape) {
            if (!empty($shape['document'])) {
                return $value;
            }
            foreach ($value as $k => $v) {
                if ($shape->hasMember($k)) {
                    $value[$k] = $this->redactValue($v, $shape->getMember($k));
                }
            }
            return $value;
        }

        if ($shape instanceof ListShape) {
            $member = $shape->getMember();
            foreach ($value as $k => $v) {
                $value[$k] = $this->redactValue($v, $member);
            }
            return $value;
        }

        if ($shape instanceof MapShape) {
            $keyShape = $shape->getKey();
            $valueShape = $shape->getValue();
            $redactKeys = $this->isSensitive($keyShape);
            $result = [];
            $i = 0;
            foreach ($value as $k => $v) {
                $i++;
                $key = $redactKeys
                    ? $this->placeholder($keyShape) . '#' . $i
                    : $k;
                $result[$key] = $this->redactValue($v, $valueShape);
            }
            return $result;
        }

        return $value;
    }

    private function isSensitive(Shape $shape): bool
    {
        if (!empty($shape['sensitive'])) {
            return true;
        }

        // Guard against a member ref that overrides a sensitive target.
        $name = $shape['name'];
        if ($name !== null && $this->service) {
            $definition = $this->service->getShapeMap()[$name];
            return !empty($definition['sensitive']);
        }

        return false;
    }

    private function placeholder(Shape $shape): string
    {
        $name = $shape['name'];

        return $name !== null ? "[{$name}]" : '[REDACTED]';
    }

    /**
     * Whether any shape reachable from the operation's input or output shape
     * is sensitive. Memoized per operation and direction.
     */
    private function operationHasSensitive(
        ?string $opName,
        string $direction
    ): bool
    {
        $key = $opName . ':' . $direction;
        if (!isset($this->sensitiveOps[$key])) {
            $shape = $this->operationShape($opName, $direction);
            $seen = [];
            $this->sensitiveOps[$key] = $shape !== null
                && $this->shapeHasSensitive($shape, $seen);
        }

        return $this->sensitiveOps[$key];
    }

    private function shapeHasSensitive(Shape $shape, array &$seen): bool
    {
        if ($this->isSensitive($shape)) {
            return true;
        }

        $name = $shape['name'];
        if ($name !== null) {
            if (isset($seen[$name])) {
                return false;
            }
            $seen[$name] = true;
        }

        if ($shape instanceof StructureShape) {
            // Shapes with no members (e.g., no modeled output) have nothing
            // to walk.
            if (!empty($shape['document']) || empty($shape['members'])) {
                return false;
            }
            foreach ($shape->getMembers() as $member) {
                if ($this->shapeHasSensitive($member, $seen)) {
                    return true;
                }
            }
        } elseif ($shape instanceof ListShape) {
            return $this->shapeHasSensitive($shape->getMember(), $seen);
        } elseif ($shape instanceof MapShape) {
            return $this->shapeHasSensitive($shape->getKey(), $seen)
                || $this->shapeHasSensitive($shape->getValue(), $seen);
        }

        return false;
    }
}
