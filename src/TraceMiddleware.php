<?php
namespace Aws;

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
     */
    public function __construct(array $config = [])
    {
        $this->config = $config + [
            'logfn'       => function ($value) { echo $value; },
            'stream_size' => 524288,
            'scrub_auth'  => true,
            'http'        => true
        ];
    }

    public function __invoke($step, $name)
    {
        $this->prevOutput = $this->prevInput = [];

        return function (callable $next) use ($step, $name) {
            return function (
                CommandInterface $command,
                RequestInterface $request = null
            ) use ($next, $step, $name) {
                $this->createHttpDebug($command);
                $start = microtime(true);
                $this->stepInput([
                    'step'    => $step,
                    'name'    => $name,
                    'request' => $this->requestArray($request),
                    'command' => $this->commandArray($command)
                ]);

                return $next($command, $request)->then(
                    function ($value) use ($step, $name, $command, $start) {
                        $this->flushHttpDebug($command);
                        $this->stepOutput($start, [
                            'step'   => $step,
                            'name'   => $name,
                            'result' => $this->resultArray($value),
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
            'instance' => spl_object_hash($cmd),
            'name'     => $cmd->getName(),
            'params'   => $cmd->toArray()
        ];
    }

    private function requestArray(RequestInterface $request = null)
    {
        return !$request ? [] : array_filter([
            'instance' => spl_object_hash($request),
            'method'   => $request->getMethod(),
            'headers'  => $request->getHeaders(),
            'body'     => $this->streamStr($request->getBody()),
            'scheme'   => $request->getUri()->getScheme(),
            'port'     => $request->getUri()->getPort(),
            'path'     => $request->getUri()->getPath(),
            'query'    => $request->getUri()->getQuery(),
        ]);
    }

    private function responseArray(ResponseInterface $response = null)
    {
        return !$response ? [] : [
            'instance'   => spl_object_hash($response),
            'statusCode' => $response->getStatusCode(),
            'headers'    => $response->getHeaders(),
            'body'       => $this->streamStr($response->getBody())
        ];
    }

    private function resultArray($value)
    {
        return $value instanceof ResultInterface
            ? [
                'instance' => spl_object_hash($value),
                'data'     => $value->toArray()
            ] : $value;
    }

    private function exceptionArray($e)
    {
        if (!($e instanceof \Exception)) {
            return $e;
        }

        $result = [
            'instance'   => spl_object_hash($e),
            'class'      => get_class($e),
            'message'    => $e->getMessage(),
            'file'       => $e->getFile(),
            'line'       => $e->getLine(),
            'trace'      => $e->getTraceAsString(),
        ];

        if ($e instanceof AwsException) {
            $result += [
                'type'       => $e->getAwsErrorType(),
                'code'       => $e->getAwsErrorCode(),
                'requestId'  => $e->getAwsRequestId(),
                'statusCode' => $e->getStatusCode(),
                'result'     => $this->resultArray($e->getResult()),
                'request'    => $this->requestArray($e->getRequest()),
                'response'   => $this->responseArray($e->getResponse()),
            ];
        }

        return $result;
    }

    private function compareArray($a, $b, $path, array &$diff)
    {
        if ($a === $b) {
            return;
        } elseif (is_array($a)) {
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
        } elseif ($value instanceof \Exception) {
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

    private function flushHttpDebug(CommandInterface $command)
    {
        if ($res = $command['@http']['debug']) {
            rewind($res);
            $this->write(stream_get_contents($res));
            fclose($res);
            $command['@http']['debug'] = null;
        }
    }

    private function write($value)
    {
        if ($this->config['scrub_auth']) {
            // S3Signature
            $value = preg_replace('/AWSAccessKeyId=AKI.+&/i', 'AWSAccessKeyId=AKI[KEY]&', $value);
            // SignatureV4 Signature and S3Signature
            $value = preg_replace('/Signature=.+/i', 'Signature=[SIGNATURE]', $value);
            // SignatureV4 access key ID
            $value = preg_replace('/Credential=AKI.+\//i', 'Credential=AKI[KEY]/', $value);
            // S3 signatures
            $value = preg_replace('/AWS AKI.+:.+/', 'AWS AKI[KEY]:[SIGNATURE]', $value);
        }

        call_user_func($this->config['logfn'], $value);
    }
}
