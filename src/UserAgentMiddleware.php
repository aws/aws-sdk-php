<?php

namespace Aws;

use Aws\EndpointDiscovery\Configuration;
use Closure;
use Psr\Http\Message\RequestInterface;

class UserAgentMiddleware
{
    const AGENT_VERSION = 2.1;
    /** @var callable  */

    private $nextHandler;
    /** @var array */
    private $args;
    /** @var MetricsBuilder */
    private $metricsBuilder;

    /**
     * Returns a middleware wrapper function.
     *
     * @param array $args
     *
     * @return Closure
     */
    public static function wrap(
        array $args
    ) : Closure
    {
        return function (callable $handler) use ($args) {
            return new self($handler, $args);
        };
    }

    /**
     * @param callable $nextHandler
     * @param array $args
     */
    public function __construct(callable $nextHandler, array $args=[])
    {
        $this->nextHandler = $nextHandler;
        $this->args = $args;
    }

    /**
     * When invoked, its injects the user agent header into the
     * request headers.
     * @param CommandInterface $command
     * @param RequestInterface $request
     *
     * @return mixed
     */
    public function __invoke(CommandInterface $command, RequestInterface $request)
    {
        $handler = $this->nextHandler;
        $this->metricsBuilder = MetricsBuilder::fromCommand($command);
        $request = $this->requestWithUserAgentHeader($request);

        return $handler($command, $request);
    }

    /**
     * Builds the user agent header value, and injects it into the request
     * headers. Then, it returns the mutated request.
     *
     * @param RequestInterface $request
     *
     * @return RequestInterface
     */
    private function requestWithUserAgentHeader(RequestInterface $request): RequestInterface
    {
        $uaAppend = $this->args['ua_append'] ?? [];
        $userAgentValue = array_merge(
            $this->buildUserAgentValue(),
            $uaAppend
        );
        // It includes the user agent values just for the User-Agent header.
        // The reason is that the SEP does not mention appending the
        // metrics into the X-Amz-User-Agent header.
        return $request->withHeader(
            'X-Amz-User-Agent',
            implode(' ', array_merge(
                $uaAppend,
                $request->getHeader('X-Amz-User-Agent')
            ))
        )->withHeader(
            'User-Agent',
            implode(' ', array_merge(
                $userAgentValue,
                $request->getHeader('User-Agent')
            ))
        );
    }

    /**
     * Builds the different user agent values.
     *
     * @return array
     */
    private function buildUserAgentValue(): array
    {
        static $fnList = [
            'sdkVersion',
            'userAgentVersion',
            'hhvmVersion',
            'osName',
            'langVersion',
            'execEnv',
            'endpointDiscovery',
            'appId',
            'metrics'
        ];
        $userAgentValue = [];
        foreach ($fnList as $fn) {
            $val = $this->{$fn}();
            if (!empty($val)) {
                $userAgentValue[] = $val;
            }
        }

        return $userAgentValue;
    }

    /**
     * Returns the user agent value for SDK version.
     *
     * @return string
     */
    private function sdkVersion(): string
    {
        return 'aws-sdk-php/' . Sdk::VERSION;
    }

    /**
     * Returns the user agent value for the agent version.
     *
     * @return string
     */
    private function userAgentVersion(): string
    {
        return 'ua/' . self::AGENT_VERSION;
    }

    /**
     * Returns the user agent value for the hhvm version, but just
     * when it is defined.
     *
     * @return string
     */
    private function hhvmVersion(): string
    {
        if (defined('HHVM_VERSION')) {
            return 'HHVM/' . HHVM_VERSION;
        }

        return "";
    }

    /**
     * Returns the user agent value for the os version.
     *
     * @return string
     */
    private function osName(): string
    {
        $disabledFunctions = explode(',', ini_get('disable_functions'));
        if (function_exists('php_uname')
            && !in_array('php_uname', $disabledFunctions, true)
        ) {
            $osName = "OS/" . php_uname('s') . '#' . php_uname('r');
            if (!empty($osName)) {
                return $osName;
            }
        }

        return "";
    }

    /**
     * Returns the user agent value for the php language used.
     *
     * @return string
     */
    private function langVersion(): string
    {
        return 'lang/php#' . phpversion();
    }

    /**
     * Returns the user agent value for the execution env.
     *
     * @return string
     */
    private function execEnv(): string
    {
        if ($executionEnvironment = getenv('AWS_EXECUTION_ENV')) {
            return $executionEnvironment;
        }

        return "";
    }

    private function endpointDiscovery(): string
    {
        $args = $this->args;
        if (isset($args['endpoint_discovery'])) {
            if (($args['endpoint_discovery'] instanceof Configuration
                && $args['endpoint_discovery']->isEnabled())
            ) {
                return 'cfg/endpoint-discovery';
            } elseif (is_array($args['endpoint_discovery'])
                && isset($args['endpoint_discovery']['enabled'])
                && $args['endpoint_discovery']['enabled']
            ) {
                return 'cfg/endpoint-discovery';
            }
        }

        return "";
    }

    /**
     * Returns the user agent value for app id, but just when an
     * app id was provided as a client argument.
     *
     * @return string
     */
    private function appId(): string
    {
        if (empty($this->args['app_id'])) {
            return "";
        }

        return 'app/' . $this->args['app_id'];
    }

    /**
     * Returns the user agent value for metrics.
     *
     * @return string
     */
    private function metrics(): string
    {
        static $metricsFn = [
            'endpointMetric',
            'accountIdModeMetric',
            'retryConfigMetric'
        ];
        foreach ($metricsFn as $fn) {
            $this->{$fn}();
        }

        $metricsEncoded = $this->metricsBuilder->build();
        if (empty($metricsEncoded)) {
            return "";
        }

        return "m/" . $metricsEncoded;
    }

    /**
     * Appends the endpoint metric into the metrics builder,
     * just if a custom endpoint was provided at client construction.
     */
    private function endpointMetric(): void
    {
        if (!empty($this->args['endpoint'])) {
            $this->metricsBuilder->append(MetricsBuilder::ENDPOINT_OVERRIDE);
        }
    }

    /**
     * Appends the account id endpoint mode metric into the metrics builder,
     * based on the account id endpoint mode provide as client argument.
     */
    private function accountIdModeMetric(): void
    {
        $accountIdMode = $this->args['account_id_endpoint_mode'] ?? null;
        if ($accountIdMode === null) {
            return;
        }

        if ($accountIdMode === 'preferred') {
            $this->metricsBuilder->append(MetricsBuilder::ACCOUNT_ID_MODE_PREFERRED);
        } elseif ($accountIdMode === 'disabled') {
            $this->metricsBuilder->append(MetricsBuilder::ACCOUNT_ID_MODE_DISABLED);
        } elseif ($accountIdMode === 'required') {
            $this->metricsBuilder->append(MetricsBuilder::ACCOUNT_ID_MODE_REQUIRED);
        }
    }

    /**
     * Appends the retry mode metric into the metrics builder,
     * based on the resolved retry config mode.
     */
    private function retryConfigMetric(): void
    {
        $retries = $this->args['retries'] ?? null;
        if ($retries === null) {
            return;
        }

        $retryMode = '';
        if ($retries instanceof \Aws\Retry\Configuration) {
            $retryMode = $retries->getMode();
        } elseif (is_array($retries)
            && isset($retries["mode"])
        ) {
            $retryMode = $retries["mode"];
        }

        if ($retryMode === 'legacy') {
            $this->metricsBuilder->append(
                MetricsBuilder::RETRY_MODE_LEGACY
            );
        } elseif ($retryMode === 'standard') {
            $this->metricsBuilder->append(
                MetricsBuilder::RETRY_MODE_STANDARD
            );
        } elseif ($retryMode === 'adaptive') {
            $this->metricsBuilder->append(
                MetricsBuilder::RETRY_MODE_ADAPTIVE
            );
        }
    }
}
