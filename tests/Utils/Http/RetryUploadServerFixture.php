<?php

declare(strict_types=1);

namespace Aws\Tests\Utils\Http;

/**
 * Loopback server that interrupts one upload and accepts its retry.
 */
final class RetryUploadServerFixture
{
    /** @var resource|null */
    private $process;

    /** @var array<int, resource> */
    private array $pipes;

    private function __construct(
        private readonly string $dir,
        private readonly string $portFile,
        private readonly string $captureFile,
        private readonly string $scriptFile,
        mixed $process,
        array $pipes,
        private readonly int $port
    ) {
        $this->process = $process;
        $this->pipes = $pipes;
    }

    public static function start(int $firstAttemptBytes = 65536): self
    {
        if ($firstAttemptBytes < 1) {
            throw new \InvalidArgumentException(
                'First-attempt byte count must be positive.'
            );
        }

        $dir = \sys_get_temp_dir()
            . '/smithy-retry-upload-' . \bin2hex(\random_bytes(6));
        if (!\mkdir($dir) && !\is_dir($dir)) {
            throw new \RuntimeException('Unable to create test server dir.');
        }

        $scriptFile = $dir . '/server.php';
        $portFile = $dir . '/port';
        $captureFile = $dir . '/capture.json';
        \file_put_contents($scriptFile, self::serverScript());

        $command = [
            PHP_BINARY,
            $scriptFile,
            $portFile,
            $captureFile,
            (string) $firstAttemptBytes
        ];
        $descriptorSpec = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w']
        ];
        $process = \proc_open($command, $descriptorSpec, $pipes);
        if (!\is_resource($process)) {
            throw new \RuntimeException('Unable to start retry server.');
        }
        \fclose($pipes[0]);

        try {
            $port = self::waitForPort(
                $portFile,
                $captureFile,
                $process,
                $pipes
            );
        } catch (\Throwable $error) {
            \proc_terminate($process);
            \proc_close($process);

            throw $error;
        }

        return new self(
            $dir,
            $portFile,
            $captureFile,
            $scriptFile,
            $process,
            $pipes,
            $port
        );
    }

    public function endpoint(): string
    {
        return "http://127.0.0.1:{$this->port}";
    }

    /**
     * @return array{
     *     attempts: list<array{
     *         method: string,
     *         path: string,
     *         body_bytes: int,
     *         sha256: string
     *     }>
     * }
     */
    public function capture(): array
    {
        $deadline = \microtime(true) + 5.0;
        while (!\file_exists($this->captureFile)) {
            if (\microtime(true) >= $deadline) {
                throw new \RuntimeException(
                    'Timed out waiting for retry upload capture.'
                );
            }
            \usleep(10000);
        }

        $json = \file_get_contents($this->captureFile);
        $capture = \is_string($json)
            ? \json_decode($json, true)
            : null;
        if (!\is_array($capture)) {
            throw new \RuntimeException('Invalid retry upload capture.');
        }
        if (isset($capture['error'])) {
            throw new \RuntimeException((string) $capture['error']);
        }

        return $capture;
    }

    public function stop(): void
    {
        if ($this->process !== null) {
            $status = \proc_get_status($this->process);
            if ($status['running']) {
                \proc_terminate($this->process);
            }
            \proc_close($this->process);
            $this->process = null;
        }

        foreach ($this->pipes as $pipe) {
            if (\is_resource($pipe)) {
                \fclose($pipe);
            }
        }

        foreach (
            [$this->portFile, $this->captureFile, $this->scriptFile]
            as $file
        ) {
            if (\file_exists($file)) {
                \unlink($file);
            }
        }

        if (\is_dir($this->dir)) {
            \rmdir($this->dir);
        }
    }

    /**
     * @param array<int, resource> $pipes
     */
    private static function waitForPort(
        string $portFile,
        string $captureFile,
        mixed $process,
        array $pipes
    ): int {
        $deadline = \microtime(true) + 5.0;
        while (!\file_exists($portFile)) {
            if (\file_exists($captureFile)) {
                $capture = \json_decode(
                    (string) \file_get_contents($captureFile),
                    true
                );
                if (\is_array($capture) && isset($capture['error'])) {
                    throw new \RuntimeException(
                        (string) $capture['error']
                    );
                }
            }

            $status = \proc_get_status($process);
            if (!$status['running']) {
                throw new \RuntimeException(
                    'Retry server exited before binding: '
                        . \stream_get_contents($pipes[2])
                );
            }
            if (\microtime(true) >= $deadline) {
                throw new \RuntimeException(
                    'Timed out starting retry server.'
                );
            }
            \usleep(10000);
        }

        $port = (int) \file_get_contents($portFile);
        if ($port < 1) {
            throw new \RuntimeException('Invalid retry server port.');
        }

        return $port;
    }

    private static function serverScript(): string
    {
        return <<<'PHP'
<?php

declare(strict_types=1);

$portFile = $argv[1];
$captureFile = $argv[2];
$firstAttemptBytes = (int) $argv[3];

function fail(string $captureFile, string $message): never
{
    file_put_contents($captureFile, json_encode(['error' => $message]));
    exit(1);
}

/**
 * @param resource $server
 *
 * @return resource
 */
function acceptConnection($server, string $captureFile)
{
    $connection = @stream_socket_accept($server, 10);
    if ($connection === false) {
        fail($captureFile, 'Timed out accepting upload attempt.');
    }
    stream_set_timeout($connection, 10);

    return $connection;
}

/**
 * @param resource $connection
 *
 * @return array{
 *     method: string,
 *     path: string,
 *     headers: array<string, list<string>>,
 *     body: string
 * }
 */
function readRequestHead($connection, string $captureFile): array
{
    $head = '';
    while (!str_contains($head, "\r\n\r\n")) {
        $chunk = fread($connection, 8192);
        if ($chunk === false) {
            fail($captureFile, 'Unable to read request headers.');
        }
        if ($chunk === '') {
            if (feof($connection)) {
                fail($captureFile, 'Connection closed before request headers.');
            }
            usleep(1000);
            continue;
        }
        $head .= $chunk;
    }

    [$headerBlock, $body] = array_pad(
        explode("\r\n\r\n", $head, 2),
        2,
        ''
    );
    $lines = explode("\r\n", $headerBlock);
    $requestLine = array_shift($lines) ?? '';
    $requestParts = explode(' ', $requestLine, 3);
    $headers = [];

    foreach ($lines as $line) {
        if (!str_contains($line, ':')) {
            continue;
        }
        [$name, $value] = explode(':', $line, 2);
        $headers[strtolower(trim($name))][] = trim($value);
    }

    foreach ($headers['expect'] ?? [] as $value) {
        if (strtolower($value) === '100-continue') {
            fwrite($connection, "HTTP/1.1 100 Continue\r\n\r\n");
            break;
        }
    }

    return [
        'method' => $requestParts[0] ?? '',
        'path' => $requestParts[1] ?? '',
        'headers' => $headers,
        'body' => $body
    ];
}

/**
 * @param resource $connection
 */
function readBody(
    $connection,
    string $body,
    int $length,
    string $captureFile
): string {
    while (strlen($body) < $length) {
        $chunk = fread($connection, $length - strlen($body));
        if ($chunk === false) {
            fail($captureFile, 'Unable to read request body.');
        }
        if ($chunk === '') {
            if (feof($connection)) {
                fail($captureFile, 'Connection closed before request body.');
            }
            usleep(1000);
            continue;
        }
        $body .= $chunk;
    }

    return $body;
}

function contentLength(array $request, string $captureFile): int
{
    $value = $request['headers']['content-length'][0] ?? null;
    if ($value === null || !ctype_digit($value)) {
        fail($captureFile, 'Upload attempt requires Content-Length.');
    }

    return (int) $value;
}

$server = @stream_socket_server('tcp://127.0.0.1:0', $errno, $errstr);
if ($server === false) {
    fail($captureFile, $errstr);
}

$address = stream_socket_get_name($server, false);
$port = (int) substr(strrchr($address, ':'), 1);
file_put_contents($portFile, (string) $port);

$firstConnection = acceptConnection($server, $captureFile);
$first = readRequestHead($firstConnection, $captureFile);
$firstLength = contentLength($first, $captureFile);
$partialLength = min($firstAttemptBytes, max(1, $firstLength - 1));
$firstBody = readBody(
    $firstConnection,
    $first['body'],
    $partialLength,
    $captureFile
);
fclose($firstConnection);

$secondConnection = acceptConnection($server, $captureFile);
$second = readRequestHead($secondConnection, $captureFile);
$secondLength = contentLength($second, $captureFile);
$secondBody = readBody(
    $secondConnection,
    $second['body'],
    $secondLength,
    $captureFile
);

fwrite(
    $secondConnection,
    "HTTP/1.1 200 OK\r\n"
        . "Content-Length: 0\r\n"
        . "Connection: close\r\n\r\n"
);
fclose($secondConnection);
fclose($server);

file_put_contents($captureFile, json_encode([
    'attempts' => [
        [
            'method' => $first['method'],
            'path' => $first['path'],
            'body_bytes' => strlen($firstBody),
            'sha256' => hash('sha256', $firstBody)
        ],
        [
            'method' => $second['method'],
            'path' => $second['path'],
            'body_bytes' => strlen($secondBody),
            'sha256' => hash('sha256', $secondBody)
        ]
    ]
]));
PHP;
    }
}
