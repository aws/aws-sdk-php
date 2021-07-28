<?php
namespace Aws\Credentials;

use Aws\Exception\CredentialsException;
use Aws\Exception\InvalidJsonException;
use Aws\Sdk;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use InvalidArgumentException as IAE;

/**
 * Credential provider that provides credentials from the EC2 metadata service.
 */
class InstanceProfileProvider
{
    const V4_SERVER_URI = '169.254.169.254';
    const V6_SERVER_URI = '[fd00:ec2::254]';
    const CRED_PATH = 'meta-data/iam/security-credentials/';
    const TOKEN_PATH = 'api/token';

    const ENV_DISABLE = 'AWS_EC2_METADATA_DISABLED';
    const ENV_TIMEOUT = 'AWS_METADATA_SERVICE_TIMEOUT';
    const ENV_RETRIES = 'AWS_METADATA_SERVICE_NUM_ATTEMPTS';
    const ENV_ENDPOINT = 'AWS_EC2_METADATA_SERVICE_ENDPOINT';
    const ENV_CONFIG_FILE = 'AWS_CONFIG_FILE';
    const ENV_ENDPOINT_MODE = 'AWS_EC2_METADATA_SERVICE_ENDPOINT_MODE';

    const CONFIG_ENDPOINT_MODE = 'ec2_metadata_service_endpoint_mode';
    const CONFIG_ENDPOINT = 'ec2_metadata_service_endpoint';

    public static $supporedIpVersions = ['IPv4', 'IPv6'];

    /** @var string */
    private $profile;

    /** @var callable */
    private $client;

    /** @var string */
    private $endpoint;

    /** @var string */
    private $endpoint_mode;

    /** @var string */
    private $configFile;

    /** @var int */
    private $retries;

    /** @var int */
    private $attempts;

    /** @var float|mixed */
    private $timeout;

    /** @var bool */
    private $secureMode = true;

    /**
     * The constructor accepts the following options:
     *
     * - timeout: Connection timeout, in seconds.
     * - profile: Optional EC2 profile name, if known.
     * - retries: Optional number of retries to be attempted.
     * - endpoint: Optional endpoint to use for fetching metadata info
     * - endpoint_mode: Optional specification to force IPv4 or IPv6; defaults to IPv4
     *
     * @param array $config Configuration options.
     */
    public function __construct(array $config = [])
    {
        $this->timeout = (float) getenv(self::ENV_TIMEOUT) ?: (isset($config['timeout']) ? $config['timeout'] : 1.0);
        $this->profile = isset($config['profile']) ? $config['profile'] : null;
        $this->retries = (int) getenv(self::ENV_RETRIES) ?: (isset($config['retries']) ? $config['retries'] : 3);
        $this->attempts = 0;
        $this->client = isset($config['client'])
            ? $config['client'] // internal use only
            : \Aws\default_http_handler();
        $configFile =
            \Aws\get_environment_variable(InstanceProfileProvider::ENV_CONFIG_FILE);
        $this->configFile = $configFile !== false ? $configFile : null;
        $this->applyEndpointMode($config);
        $this->applyEndpoint($config);
    }

    /**
     * Loads instance profile credentials.
     *
     * @return PromiseInterface
     */
    public function __invoke()
    {
        return Promise\coroutine(function () {

            // Retrieve token or switch out of secure mode
            $token = null;
            while ($this->secureMode && is_null($token)) {
                try {
                    $token = (yield $this->request(
                        self::TOKEN_PATH,
                        'PUT',
                        [
                            'x-aws-ec2-metadata-token-ttl-seconds' => 21600
                        ]
                    ));
                } catch (TransferException $e) {
                    if (!method_exists($e, 'getResponse')
                        || empty($e->getResponse())
                        || !in_array(
                            $e->getResponse()->getStatusCode(),
                            [400, 500, 502, 503, 504]
                        )
                    ) {
                        $this->secureMode = false;
                    } else {
                        $this->handleRetryableException(
                            $e,
                            [],
                            $this->createErrorMessage(
                                'Error retrieving metadata token'
                            )
                        );
                    }
                }
                $this->attempts++;
            }

            // Set token header only for secure mode
            $headers = [];
            if ($this->secureMode) {
                $headers = [
                    'x-aws-ec2-metadata-token' => $token
                ];
            }

            // Retrieve profile
            while (!$this->profile) {
                try {
                    $this->profile = (yield $this->request(
                        self::CRED_PATH,
                        'GET',
                        $headers
                    ));
                } catch (TransferException $e) {
                    // 401 indicates insecure flow not supported, switch to
                    // attempting secure mode for subsequent calls
                    if (!empty($this->getExceptionStatusCode($e))
                        && $this->getExceptionStatusCode($e) === 401
                    ) {
                        $this->secureMode = true;
                    }
                    $this->handleRetryableException(
                        $e,
                        [ 'blacklist' => [401, 403] ],
                        $this->createErrorMessage($e->getMessage())
                    );
                }

                $this->attempts++;
            }

            // Retrieve credentials
            $result = null;
            while ($result == null) {
                try {
                    $json = (yield $this->request(
                        self::CRED_PATH . $this->profile,
                        'GET',
                        $headers
                    ));
                    $result = $this->decodeResult($json);
                } catch (InvalidJsonException $e) {
                    $this->handleRetryableException(
                        $e,
                        [ 'blacklist' => [401, 403] ],
                        $this->createErrorMessage(
                            'Invalid JSON response, retries exhausted'
                        )
                    );
                } catch (TransferException $e) {
                    // 401 indicates insecure flow not supported, switch to
                    // attempting secure mode for subsequent calls
                    if (!empty($this->getExceptionStatusCode($e))
                        && $this->getExceptionStatusCode($e) === 401
                    ) {
                        $this->secureMode = true;
                    }
                    $this->handleRetryableException(
                        $e,
                        [ 'blacklist' => [401, 403] ],
                        $this->createErrorMessage($e->getMessage())
                    );
                }
                $this->attempts++;
            }
            yield new Credentials(
                $result['AccessKeyId'],
                $result['SecretAccessKey'],
                $result['Token'],
                strtotime($result['Expiration'])
            );
        });
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $headers
     * @return PromiseInterface Returns a promise that is fulfilled with the
     *                          body of the response as a string.
     */
    private function request($url, $method = 'GET', $headers = [])
    {
        $disabled = getenv(self::ENV_DISABLE) ?: false;
        if (strcasecmp($disabled, 'true') === 0) {
            throw new CredentialsException(
                $this->createErrorMessage('EC2 metadata service access disabled')
            );
        }

        $fn = $this->client;
        $request = new Request(
            $method,
            $this->endpoint . $url,
            ['force_ip_resolve' => $this->endpoint_mode]
        );

        $userAgent = 'aws-sdk-php/' . Sdk::VERSION;
        if (defined('HHVM_VERSION')) {
            $userAgent .= ' HHVM/' . HHVM_VERSION;
        }
        $userAgent .= ' ' . \Aws\default_user_agent();
        $request = $request->withHeader('User-Agent', $userAgent);
        foreach ($headers as $key => $value) {
            $request = $request->withHeader($key, $value);
        }

        return $fn($request, ['timeout' => $this->timeout])
            ->then(function (ResponseInterface $response) {
                return (string) $response->getBody();
            })->otherwise(function (array $reason) {
                $reason = $reason['exception'];
                if ($reason instanceof TransferException) {
                    throw $reason;
                }
                $msg = $reason->getMessage();
                throw new CredentialsException(
                    $this->createErrorMessage($msg)
                );
            });
    }

    private function handleRetryableException(
        \Exception $e,
        $retryOptions,
        $message
    ) {
        $isRetryable = true;
        if (!empty($status = $this->getExceptionStatusCode($e))
            && isset($retryOptions['blacklist'])
            && in_array($status, $retryOptions['blacklist'])
        ) {
            $isRetryable = false;
        }
        if ($isRetryable && $this->attempts < $this->retries) {
            sleep(pow(1.2, $this->attempts));
        } else {
            throw new CredentialsException($message);
        }
    }

    private function getExceptionStatusCode(\Exception $e)
    {
        if (method_exists($e, 'getResponse')
            && !empty($e->getResponse())
        ) {
            return $e->getResponse()->getStatusCode();
        }
        return null;
    }

    private function createErrorMessage($previous)
    {
        return "Error retrieving credentials from the instance profile "
            . "metadata service. ({$previous})";
    }

    private function decodeResult($response)
    {
        $result = json_decode($response, true);

        if (json_last_error() > 0) {
            throw new InvalidJsonException();
        }

        if ($result['Code'] !== 'Success') {
            throw new CredentialsException('Unexpected instance profile '
                .  'response code: ' . $result['Code']);
        }

        return $result;
    }

    /**
     * @param $endpoint_mode
     */
    private function applyEndpointMode($config)
    {
        $endpoint_mode = isset($config['endpoint_mode'])
                ? $config['endpoint_mode']
                : false;
        if ($endpoint_mode == false) {
            $endpoint_mode =
                \Aws\get_environment_variable(InstanceProfileProvider::ENV_ENDPOINT_MODE);
        }
        if ($endpoint_mode == false) {
            $endpoint_mode =
                \Aws\get_config_variable(
                    InstanceProfileProvider::CONFIG_ENDPOINT_MODE,
                    $this->configFile
                );
        }

        if ($endpoint_mode !== false) {
            if (!in_array($endpoint_mode, self::$supporedIpVersions)) {
                throw new IAE(
                    "Invalid input for endpoint_mode provided.  Valid inputs include: "
                    . implode(', ', self::$supporedIpVersions)
                );
            }
            $this->endpoint_mode = str_replace('IP', '', $endpoint_mode);
        } else {
            $this->endpoint_mode = 'v4';
        }
    }

    /**
     * @param array $config
     * @param $configFile
     * @return array
     */
    private function getEndpointMode(array $config, $configFile)
    {

        return $config;
    }

    /**
     * @param array $config
     * @param $configFile
     */
    private function applyEndpoint(array $config)
    {
        $endpoint = isset($config['endpoint']) ? $config['endpoint'] : false;
        if ($endpoint === false) {
            $endpoint =
                \Aws\get_environment_variable(InstanceProfileProvider::ENV_ENDPOINT);
        }
        if ($endpoint === false) {
            $endpoint =
                \Aws\get_config_variable(
                    InstanceProfileProvider::CONFIG_ENDPOINT,
                    $this->configFile
                );
        }
        if ($endpoint !== false) {
            $this->endpoint = 'http://' . $endpoint . '/latest/';
        } else {
            $endpoint_uri =
                $this->endpoint_mode == 'v4'
                    ? self::V4_SERVER_URI
                    : self::V6_SERVER_URI;
            $this->endpoint = 'http://' . $endpoint_uri . '/latest/';
        }
    }
}
