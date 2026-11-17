<?php
namespace Aws\Credentials;

use Aws\Exception\CredentialDaemonException;
use Aws\Exception\CredentialsException;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Credential provider that gets credentials from a local credential daemon
 * for a profile in the shared config file that sets `daemon_credential`.
 *
 * Each fetch sends one JSON-RPC 2.0 request over a Unix domain socket, found
 * at the first of:
 * 1. the AWS_CREDENTIAL_DAEMON_SOCKET environment variable, when it is an
 *    absolute path,
 * 2. `$HOME/.aws/credential-daemon.sock`, when anything is there, including
 *    a link whose target is missing.
 *
 * A {@see CredentialDaemonException} stops {@see CredentialProvider::chain()}.
 * A profile that does not use a credential daemon is rejected with a
 * {@see CredentialsException}, so the chain moves on.
 *
 * <code>
 * $provider = new CredentialDaemonProvider(['profile' => 'dev']);
 * $credentials = $provider()->wait();
 * </code>
 */
class CredentialDaemonProvider
{
    const ENV_SOCKET = 'AWS_CREDENTIAL_DAEMON_SOCKET';
    const DOC_LINK = '<CREDENTIAL_DAEMON_DOC>';
    const DEFAULT_CONNECT_TIMEOUT = 1.0;
    const DEFAULT_TIMEOUT = 5.0;

    private const RPC_METHOD = 'credential/get';
    private const MAX_REPLY_BYTES = 64000;
    private const NAME_PATTERN = '/\A[A-Za-z0-9_-][A-Za-z0-9._-]{0,63}\z/';
    private const EXPIRES_PATTERN
        = '/\A(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})(?:\.\d{1,9})?Z\z/';
    private const HOME_SOCKET = '.aws/credential-daemon.sock';

    /** @var int */
    private static $nextId = 1;

    /** @var string */
    private $profile;

    /** @var string|null */
    private $filename;

    /** @var float */
    private $connectTimeout;

    /** @var float */
    private $timeout;

    /**
     * The following options are supported:
     *
     * - profile: (string) Profile to use. Defaults to the AWS_PROFILE
     *   environment variable, or "default".
     * - filename: (string) Shared config file to read. Defaults to the
     *   AWS_CONFIG_FILE environment variable, or ~/.aws/config, resolved on
     *   each call.
     * - connect_timeout: (float) Seconds to wait for the connection to the
     *   credential daemon. Defaults to 1.
     * - timeout: (float) Seconds the whole call to the credential daemon may
     *   take. Defaults to 5.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->profile = isset($config['profile'])
            ? (string) $config['profile']
            : (getenv(CredentialProvider::ENV_PROFILE) ?: 'default');
        $this->filename = $config['filename'] ?? null;
        $this->connectTimeout = self::validateTimeout(
            $config,
            'connect_timeout',
            self::DEFAULT_CONNECT_TIMEOUT
        );
        $this->timeout = self::validateTimeout(
            $config,
            'timeout',
            self::DEFAULT_TIMEOUT
        );
    }

    /**
     * Loads credentials from the credential daemon. Each call asks the
     * daemon again; wrap the provider in CredentialProvider::memoize() to
     * cache them.
     *
     * @param mixed $previousCredentials Ignored.
     *
     * @return PromiseInterface
     */
    public function __invoke($previousCredentials = null): PromiseInterface
    {
        $file = $this->filename ?? CredentialProvider::getConfigFileName();
        if (!@is_readable($file)) {
            return self::reject("Cannot read credential daemon configuration from {$file}");
        }
        $data = \Aws\parse_ini_file($file, true, INI_SCANNER_RAW);
        if (!is_array($data)) {
            return self::reject("Invalid config file: {$file}");
        }
        $sectionName = self::findSection($data, $this->profile);
        if ($sectionName === null) {
            return self::reject("Profile {$this->profile} does not exist in {$file}.");
        }
        if (!is_array($data[$sectionName])
            || !self::sectionUsesDaemon($data[$sectionName])
        ) {
            return self::reject(
                "Profile {$sectionName} in {$file} does not use a credential daemon."
            );
        }
        return $this->fetchForSection($data[$sectionName], $sectionName, $file);
    }

    /**
     * Returns the socket path a fetch would dial now, or null when no
     * location applies.
     *
     * @return string|null
     */
    public function resolveSocketPath(): ?string
    {
        $env = getenv(self::ENV_SOCKET);
        if (is_string($env) && self::isAbsolute($env)) {
            return $env;
        }

        $home = $this->getHomeSocketPath();
        if ($home !== null && self::pathExists($home)) {
            return $home;
        }

        return null;
    }

    private static function pathExists(string $path): bool
    {
        // lstat() so that a link to a missing target still counts, and the
        // dial reports the link instead of saying no socket was found.
        clearstatcache(true, $path);

        return @lstat($path) !== false;
    }

    /**
     * Returns true when the named profile of the shared config file gets its
     * credentials from a credential daemon.
     *
     * @internal
     *
     * @param string      $profile Profile name, without the "profile " prefix.
     * @param string|null $file    Config file. Defaults to the shared config file.
     *
     * @return bool
     */
    public static function profileUsesDaemon(string $profile, ?string $file = null): bool
    {
        $file = $file ?? CredentialProvider::getConfigFileName();
        if (!@is_readable($file)) {
            return false;
        }
        $data = \Aws\parse_ini_file($file, true, INI_SCANNER_RAW);
        if (!is_array($data)) {
            return false;
        }
        $sectionName = self::findSection($data, $profile);

        return $sectionName !== null
            && is_array($data[$sectionName])
            && self::sectionUsesDaemon($data[$sectionName]);
    }

    /**
     * Returns true when a config file section gets its credentials from a
     * credential daemon.
     *
     * @internal
     *
     * @param array $section
     *
     * @return bool
     */
    public static function sectionUsesDaemon(array $section): bool
    {
        if (!array_key_exists('daemon_credential', $section)) {
            return false;
        }
        // An SSO profile with neither sso_account_id nor sso_role_name
        // resolves as if `daemon_credential` were not set.
        if (self::isSsoSection($section)
            && empty($section['sso_account_id'])
            && empty($section['sso_role_name'])
        ) {
            return false;
        }

        return true;
    }

    /**
     * Fetches credentials for a config file section that uses a credential
     * daemon.
     *
     * @internal
     *
     * @param array  $section     The section's settings.
     * @param string $sectionName The section's name in the file.
     * @param string $file        The config file.
     *
     * @return PromiseInterface
     */
    public function fetchForSection(
        array $section,
        string $sectionName,
        string $file
    ): PromiseInterface
    {
        try {
            if (self::setsOneSsoKey($section)) {
                $this->validateConfig($section, $sectionName, $file);

                // The SSO provider's own error. It isn't a daemon error, so a
                // chain moves on, and no other setting of the profile is used.
                return CredentialProvider::sso($sectionName, $file)();
            }
            $credentials = $this->fetch($section, $sectionName, $file);
        } catch (\Exception $e) {
            return new Promise\RejectedPromise($e);
        }

        return Promise\Create::promiseFor($credentials);
    }

    /**
     * @return string
     */
    protected function getOsFamily(): string
    {
        return PHP_OS_FAMILY;
    }

    /**
     * @return bool
     */
    protected function hasUnixTransport(): bool
    {
        return in_array('unix', stream_get_transports(), true);
    }

    /**
     * @return string|null `$HOME/.aws/credential-daemon.sock`, or null when
     *                     `HOME` is unset, empty or not an absolute path.
     */
    protected function getHomeSocketPath(): ?string
    {
        $home = getenv('HOME');
        // A relative HOME would resolve under the current directory, where
        // another user could place a socket.
        if (!is_string($home) || !self::isAbsolute($home)) {
            return null;
        }

        return rtrim($home, '/') . '/' . self::HOME_SOCKET;
    }

    /**
     * @param string $path
     * @param float  $timeout Seconds to wait for the connection.
     * @param mixed  $errno
     * @param mixed  $errstr
     *
     * @return resource|false
     */
    protected function connect(string $path, float $timeout, &$errno, &$errstr)
    {
        return @stream_socket_client(
            'unix://' . $path,
            $errno,
            $errstr,
            $timeout
        );
    }

    /**
     * @throws CredentialDaemonException
     */
    /**
     * Checks the settings of a daemon profile and returns its credential
     * name.
     *
     * @throws CredentialDaemonException
     */
    private function validateConfig(array $section, string $sectionName, string $file): string
    {
        $name = $section['daemon_credential'];
        if (!is_string($name) || !preg_match(self::NAME_PATTERN, $name)) {
            throw new CredentialDaemonException(
                "Profile {$sectionName} in {$file} has an invalid `daemon_credential`."
                . " A credential name is 1 to 64 letters, digits, '.', '_' or '-',"
                . " and does not start with '.'.",
                CredentialDaemonException::INVALID_CONFIG
            );
        }
        if (array_key_exists('web_identity_token_file', $section)) {
            throw new CredentialDaemonException(
                "Profile {$sectionName} in {$file} has two credential sources,"
                . " `daemon_credential` and `web_identity_token_file`. Remove one"
                . " of them.",
                CredentialDaemonException::INVALID_CONFIG
            );
        }
        if (array_key_exists('role_arn', $section)) {
            $bareName = strpos($sectionName, 'profile ') === 0
                ? substr($sectionName, strlen('profile '))
                : $sectionName;
            throw new CredentialDaemonException(
                "Profile {$sectionName} in {$file} sets both `daemon_credential`"
                . " and `role_arn`, but a profile that uses a credential daemon"
                . " cannot assume a role. Move the role to its own profile with"
                . " `source_profile = {$bareName}`.",
                CredentialDaemonException::INVALID_CONFIG
            );
        }

        return $name;
    }

    /**
     * @throws CredentialDaemonException
     */
    private function fetch(array $section, string $sectionName, string $file): Credentials
    {
        $name = $this->validateConfig($section, $sectionName, $file);
        $params = ['credential' => $name];
        if (self::isSsoSection($section)) {
            $params['account_id'] = $section['sso_account_id'];
            $params['role_name'] = $section['sso_role_name'];
        }

        $os = $this->getOsFamily();
        if (!in_array($os, ['Linux', 'Darwin'], true) || !$this->hasUnixTransport()) {
            throw new CredentialDaemonException(
                "Profile {$sectionName} in {$file} uses a credential daemon,"
                . " which is not supported on this platform ({$os}). It needs"
                . " Linux or macOS and PHP's unix socket transport. See "
                . self::DOC_LINK,
                CredentialDaemonException::UNSUPPORTED_PLATFORM
            );
        }

        try {
            $request = json_encode(
                [
                    'jsonrpc' => '2.0',
                    'id' => self::$nextId++,
                    'method' => self::RPC_METHOD,
                    'params' => $params,
                ],
                JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
            ) . "\n";
        } catch (\JsonException $e) {
            throw new CredentialDaemonException(
                "Profile {$sectionName} in {$file} has settings that cannot be"
                . " sent to the credential daemon (sso_account_id, sso_role_name).",
                CredentialDaemonException::INVALID_CONFIG,
                $e
            );
        }

        $path = $this->resolveSocketPath();
        if ($path === null) {
            throw new CredentialDaemonException(
                'No credential daemon socket was found. Install the credential'
                . ' daemon or link its socket to $HOME/.aws/credential-daemon.sock,'
                . ' or set ' . self::ENV_SOCKET . ' to the socket path. See '
                . self::DOC_LINK,
                CredentialDaemonException::NOT_RUNNING
            );
        }

        return $this->parseReply($this->sendRequest($path, $request), $name);
    }

    /**
     * Returns the target of the `$HOME/.aws` socket link when $path is that
     * link and its target is missing, or null.
     */
    private function danglingLinkTarget(string $path): ?string
    {
        if ($path !== $this->getHomeSocketPath() || !is_link($path)) {
            return null;
        }
        clearstatcache(true, $path);
        if (@stat($path) !== false) {
            return null;
        }
        $target = @readlink($path);

        return is_string($target)
            ? self::sanitize($target, 1024)
            : '(unreadable)';
    }

    /**
     * Sends the request line and returns the reply line, without its "\n".
     *
     * @throws CredentialDaemonException
     */
    private function sendRequest(string $path, string $request): string
    {
        $start = microtime(true);
        $deadline = $start + $this->timeout;
        $budget = min($this->connectTimeout, $this->timeout);
        $errno = 0;
        $errstr = '';

        $socket = $this->connect($path, $budget, $errno, $errstr);
        if (!is_resource($socket)) {
            // ETIMEDOUT
            $timedOutErrno = $this->getOsFamily() === 'Darwin' ? 60 : 110;
            if ($errno === $timedOutErrno || microtime(true) - $start >= $budget) {
                $reason = 'connecting timed out after '
                    . ($this->timeout < $this->connectTimeout
                        ? 'the call timeout (' . self::formatSeconds($this->timeout) . 's)'
                        : 'the connect timeout (' . self::formatSeconds($this->connectTimeout) . 's)');
            } else {
                $detail = is_string($errstr) && $errstr !== ''
                    ? self::sanitize($errstr, 256)
                    : "error {$errno}";
                $reason = 'connect failed: ' . $detail;
            }
            $target = $this->danglingLinkTarget($path);
            if ($target !== null) {
                throw new CredentialDaemonException(
                    "The credential daemon socket link {$path} points to"
                    . " {$target}, which does not exist ({$reason}). Start the"
                    . ' credential daemon or link its socket again; see '
                    . self::DOC_LINK,
                    CredentialDaemonException::NOT_RUNNING
                );
            }
            throw new CredentialDaemonException(
                "Cannot reach the credential daemon at {$path} ({$reason})."
                . ' Start the credential daemon; see ' . self::DOC_LINK,
                CredentialDaemonException::NOT_RUNNING
            );
        }

        try {
            stream_set_blocking($socket, false);

            while ($request !== '') {
                $this->waitForSocket($socket, false, $deadline, $path);
                error_clear_last();
                $written = @fwrite($socket, $request);
                if ($written === false || $written === 0) {
                    throw new CredentialDaemonException(
                        "The connection to the credential daemon at {$path}"
                        . ' closed while sending the request'
                        . self::lastErrorDetail() . '.',
                        CredentialDaemonException::PROTOCOL_ERROR
                    );
                }
                $request = (string) substr($request, $written);
            }

            $buffer = '';
            while (true) {
                $pos = strpos($buffer, "\n");
                if ($pos !== false) {
                    return substr($buffer, 0, $pos);
                }
                if (strlen($buffer) > self::MAX_REPLY_BYTES) {
                    throw new CredentialDaemonException(
                        "The reply from the credential daemon at {$path} exceeds "
                        . self::MAX_REPLY_BYTES . ' bytes.',
                        CredentialDaemonException::PROTOCOL_ERROR
                    );
                }
                $this->waitForSocket($socket, true, $deadline, $path);
                error_clear_last();
                $chunk = @fread($socket, self::MAX_REPLY_BYTES + 1 - strlen($buffer));
                if ($chunk === false || $chunk === '') {
                    // PHP's socket read sets no error on a reset, so a false
                    // return with no error still says the read failed. A clean
                    // close returns "".
                    $detail = self::lastErrorDetail();
                    if ($detail === '' && $chunk === false) {
                        $detail = ' (read failed)';
                    }
                    if (feof($socket)) {
                        throw new CredentialDaemonException(
                            "The connection to the credential daemon at {$path}"
                            . ' closed before a full reply line was received'
                            . $detail . '.',
                            CredentialDaemonException::PROTOCOL_ERROR
                        );
                    }
                    continue;
                }
                $buffer .= $chunk;
            }
        } finally {
            fclose($socket);
        }
    }

    /**
     * Returns " (<error>)" for the last PHP error, or "" when there is none.
     */
    private static function lastErrorDetail(): string
    {
        $error = error_get_last();
        if (!is_array($error) || !isset($error['message'])
            || !is_string($error['message']) || $error['message'] === ''
        ) {
            return '';
        }

        return ' (' . self::sanitize($error['message'], 256) . ')';
    }

    /**
     * @param resource $socket
     *
     * @throws CredentialDaemonException
     */
    private function waitForSocket($socket, bool $read, float $deadline, string $path): void
    {
        $remaining = $deadline - microtime(true);
        if ($remaining <= 0) {
            throw $this->callTimeoutError($path);
        }
        $readSet = $read ? [$socket] : null;
        $writeSet = $read ? null : [$socket];
        $exceptSet = null;
        $seconds = (int) floor($remaining);
        $micro = (int) (($remaining - floor($remaining)) * 1e6);
        $ready = @stream_select($readSet, $writeSet, $exceptSet, $seconds, $micro);
        if ($ready === false) {
            throw new CredentialDaemonException(
                "I/O error while waiting for the credential daemon at {$path}."
                . ' Check that the credential daemon is running; see ' . self::DOC_LINK,
                CredentialDaemonException::NOT_RUNNING
            );
        }
        if ($ready === 0) {
            throw $this->callTimeoutError($path);
        }
    }

    private function callTimeoutError(string $path): CredentialDaemonException
    {
        return new CredentialDaemonException(
            "The credential daemon at {$path} did not reply within the call"
            . ' timeout (' . self::formatSeconds($this->timeout) . 's).'
            . ' Check that the credential daemon is running; see ' . self::DOC_LINK,
            CredentialDaemonException::NOT_RUNNING
        );
    }

    /**
     * @throws CredentialDaemonException
     */
    private function parseReply(string $line, string $name): Credentials
    {
        // Protocol errors don't quote the reply, which can hold secrets.
        $reply = json_decode($line, false, 512);
        if (json_last_error() !== JSON_ERROR_NONE || !$reply instanceof \stdClass) {
            throw self::protocolError('the reply is not a JSON object');
        }
        if (!property_exists($reply, 'jsonrpc') || $reply->jsonrpc !== '2.0') {
            throw self::protocolError('the reply is not a JSON-RPC 2.0 message');
        }
        // A null `result` or `error` counts as absent.
        $hasResult = isset($reply->result);
        $hasError = isset($reply->error);
        if ($hasResult === $hasError) {
            throw self::protocolError('the reply must hold exactly one of `result` and `error`');
        }
        if ($hasError) {
            throw self::errorFromReply($reply->error, $name);
        }

        $result = $reply->result;
        if (!$result instanceof \stdClass
            || !isset($result->material)
            || !$result->material instanceof \stdClass
            || !isset($result->material->type)
            || !is_string($result->material->type)
            || $result->material->type === ''
        ) {
            throw self::protocolError('the reply holds no credential material');
        }
        $material = $result->material;
        if ($material->type !== 'session_credentials') {
            throw new CredentialDaemonException(
                'The credential daemon returned credential material of type `'
                . self::sanitize($material->type, 64) . "` for credential {$name},"
                . ' which this version of the SDK does not support. Update the SDK.',
                CredentialDaemonException::UNSUPPORTED_MATERIAL
            );
        }

        foreach (['access_key_id', 'secret_access_key'] as $field) {
            if (!self::isNonEmptyString($material, $field)) {
                throw self::protocolError("the reply is missing `material.{$field}`");
            }
        }
        if (!self::isNonEmptyString($result, 'expires_at')) {
            throw self::protocolError('the reply is missing `expires_at`');
        }

        return new Credentials(
            $material->access_key_id,
            $material->secret_access_key,
            self::isNonEmptyString($material, 'session_token')
                ? $material->session_token
                : null,
            self::parseExpiry($result->expires_at),
            self::isNonEmptyString($material, 'account_id')
                ? $material->account_id
                : null,
            CredentialSources::CREDENTIAL_DAEMON
        );
    }

    /**
     * @param mixed  $error
     * @param string $name
     */
    private static function errorFromReply($error, string $name): CredentialDaemonException
    {
        if (!$error instanceof \stdClass) {
            return self::protocolError('the reply `error` is not an object');
        }

        $daemonCode = null;
        if (isset($error->data)
            && $error->data instanceof \stdClass
            && isset($error->data->code)
            && is_string($error->data->code)
        ) {
            $daemonCode = $error->data->code;
        }
        $message = isset($error->message) && is_string($error->message)
            ? self::sanitize($error->message, 512)
            : '';
        $suffix = $message !== ''
            ? " Credential daemon message: {$message}"
            : '';

        switch ($daemonCode) {
            case CredentialDaemonException::REAUTH_REQUIRED:
                return new CredentialDaemonException(
                    "The credential daemon needs you to sign in again for credential {$name}."
                    . $suffix,
                    CredentialDaemonException::REAUTH_REQUIRED
                );
            case CredentialDaemonException::CREDENTIAL_NOT_FOUND:
                return new CredentialDaemonException(
                    "The credential daemon has no credential named {$name} for this user."
                    . ' Sign in again.' . $suffix,
                    CredentialDaemonException::CREDENTIAL_NOT_FOUND
                );
            default:
                $codeText = $daemonCode !== null
                    ? ' (code ' . self::sanitize($daemonCode, 64) . ')'
                    : '';
                return new CredentialDaemonException(
                    "The credential daemon rejected the request for credential {$name}"
                    . $codeText . '.' . $suffix,
                    CredentialDaemonException::REQUEST_REJECTED
                );
        }
    }

    /**
     * @throws CredentialDaemonException
     */
    private static function parseExpiry(string $value): int
    {
        if (!preg_match(self::EXPIRES_PATTERN, $value, $m)
            || !checkdate((int) $m[2], (int) $m[3], (int) $m[1])
            || (int) $m[4] >= 24
            || (int) $m[5] >= 60
            || (int) $m[6] > 60
        ) {
            throw self::protocolError('the reply has an unparseable `expires_at`');
        }

        return gmmktime(
            (int) $m[4],
            (int) $m[5],
            (int) $m[6],
            (int) $m[2],
            (int) $m[3],
            (int) $m[1]
        );
    }

    private static function protocolError(string $what): CredentialDaemonException
    {
        return new CredentialDaemonException(
            "Invalid reply from the credential daemon: {$what}.",
            CredentialDaemonException::PROTOCOL_ERROR
        );
    }

    private static function isNonEmptyString(\stdClass $object, string $field): bool
    {
        return isset($object->{$field})
            && is_string($object->{$field})
            && $object->{$field} !== '';
    }

    /**
     * Removes control characters and caps the length, in characters.
     */
    private static function sanitize(string $value, int $max): string
    {
        $stripped = preg_replace('/\p{Cc}/u', '', $value);
        if ($stripped === null) {
            // Not valid UTF-8.
            $stripped = (string) preg_replace('/[\x00-\x1F\x7F]/', '', $value);
            return substr($stripped, 0, $max);
        }
        if (preg_match('/\A.{0,' . $max . '}/su', $stripped, $m)) {
            return $m[0];
        }

        return $stripped;
    }

    private static function isSsoSection(array $section): bool
    {
        return !empty($section['sso_session']) || !empty($section['sso_start_url']);
    }

    private static function setsOneSsoKey(array $section): bool
    {
        return self::isSsoSection($section)
            && empty($section['sso_account_id']) !== empty($section['sso_role_name']);
    }

    /**
     * Returns the profile's section name, preferring "profile <name>".
     */
    private static function findSection(array $data, string $profile): ?string
    {
        if (isset($data['profile ' . $profile])) {
            return 'profile ' . $profile;
        }
        if (isset($data[$profile])) {
            return $profile;
        }

        return null;
    }

    private static function isAbsolute(string $path): bool
    {
        return $path !== '' && $path[0] === '/';
    }

    private static function formatSeconds(float $seconds): string
    {
        return rtrim(rtrim(sprintf('%.3F', $seconds), '0'), '.');
    }

    private static function validateTimeout(array $config, string $key, float $default): float
    {
        if (!array_key_exists($key, $config)) {
            return $default;
        }
        $value = $config[$key];
        if (!is_int($value) && !is_float($value) && !(is_string($value) && is_numeric($value))) {
            throw new \InvalidArgumentException(
                "The credential daemon option '{$key}' must be a number of seconds greater than 0."
            );
        }
        $value = (float) $value;
        if (!($value > 0) || is_nan($value) || is_infinite($value)) {
            throw new \InvalidArgumentException(
                "The credential daemon option '{$key}' must be a number of seconds greater than 0."
            );
        }

        return $value;
    }

    private static function reject(string $message): PromiseInterface
    {
        return new Promise\RejectedPromise(new CredentialsException($message));
    }
}
