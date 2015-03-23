<?php
namespace Aws\Api;

use Aws\Exception\UnresolvedApiException;

/**
 * API providers.
 *
 * An API provider is a function that accepts a type, service, and version and
 * returns an array of API data on success or NULL if no API data can be created
 * for the provided arguments.
 *
 * You can wrap your calls to an API provider with the
 * {@see ApiProvider::resolve} method to ensure that API data is created. If the
 * API data is not created, then the resolve() method will throw a
 * {@see Aws\Exception\UnresolvedApiException}.
 *
 *     use Aws\Api\ApiProvider;
 *     $provider = ApiProvider::defaultProvider();
 *     // Returns an array or NULL.
 *     $data = $provider('api', 's3', '2006-03-01');
 *     // Returns an array or throws.
 *     $data = ApiProvider::resolve($provider, 'api', 'elasticfood', '2020-01-01');
 *
 * You can compose multiple providers into a single provider using
 * {@see Aws\or_chain}. This method accepts providers as arguments and
 * returns a new function that will invoke each provider until a non-null value
 * is returned.
 *
 *     $a = ApiProvider::filesystem(sys_get_temp_dir() . '/aws-beta-models');
 *     $b = ApiProvider::manifest();
 *
 *     $c = \Aws\or_chain($a, $b);
 *     $data = $c('api', 'betaservice', '2015-08-08'); // $a handles this.
 *     $data = $c('api', 's3', '2006-03-01');          // $b handles this.
 *     $data = $c('api', 'invalid', '2014-12-15');     // Neither handles this.
 */
class ApiProvider
{
    /** @var array A map of public API type names to their file suffix. */
    private static $typeMap = [
        'api'       => 'api',
        'paginator' => 'paginators',
        'waiter'    => 'waiters2',
    ];

    /** @var array The available API version manifest for each service. */
    private $versions;

    /** @var bool Whether or not the manifest is provided or calculated. */
    private $hasManifest;

    /** @var string The directory containing service models. */
    private $modelsDir;

    /**
     * Resolves an API provider and ensures a non-null return value.
     *
     * @param callable $provider Provider function to invoke.
     * @param string   $type     Type of data ('api', 'waiter', 'paginator').
     * @param string   $service  Service name.
     * @param string   $version  API version.
     *
     * @return array
     * @throws UnresolvedApiException
     */
    public static function resolve(callable $provider, $type, $service, $version)
    {
        // Execute the provider and return the result, if there is one.
        $result = $provider($type, $service, $version);
        if (is_array($result)) {
            return $result;
        }

        // Throw an exception with a message depending on the inputs.
        if (!isset(self::$typeMap[$type])) {
            $msg = "The type must be one of: " . join(', ', self::$typeMap);
        } elseif ($service) {
            $msg = "The {$service} service does not have version: {$version}.";
        } else {
            $msg = "You must specify a service name to retrieve its API data.";
        }
        throw new UnresolvedApiException($msg);
    }

    /**
     * Default SDK API provider.
     *
     * This provider loads pre-built manifest data from the `data` directory.
     *
     * @return self
     */
    public static function defaultProvider()
    {
        $dir = __DIR__ . '/../data';

        return new self($dir, require $dir . '/api-version-manifest.php');
    }

    /**
     * Loads API data after resolving the version to the latest, compatible,
     * available version based on the provided manifest data.
     *
     * Manifest data is essentially an associative array of service names to
     * associative arrays of API version aliases.
     *
     * [
     *   ...
     *   'ec2' => [
     *     'latest'     => '2014-10-01',
     *     '2014-10-01' => '2014-10-01',
     *     '2014-09-01' => '2014-10-01',
     *     '2014-06-15' => '2014-10-01',
     *     ...
     *   ],
     *   'ecs' => [...],
     *   'elasticache' => [...],
     *   ...
     * ]
     *
     * @param string $dir      Directory containing service models.
     * @param array  $manifest The API version manifest data.
     *
     * @return self
     */
    public static function manifest($dir, array $manifest)
    {
        return new self($dir, $manifest);
    }

    /**
     * Loads API data from the specified directory.
     *
     * If "latest" is specified as the version, this provider must glob the
     * directory to find which is the latest available version.
     *
     * @param string $dir Directory containing service models.
     *
     * @return self
     * @throws \InvalidArgumentException if the provided `$dir` is invalid.
     */
    public static function filesystem($dir)
    {
        return new self($dir);
    }

    /**
     * Retrieves a list of valid versions for the specified service.
     *
     * @param string $service Service name
     *
     * @return array
     */
    public function getVersions($service)
    {
        if (!isset($this->versions[$service])) {
            if ($this->hasManifest) {
                return [];
            }
            $this->buildVersionsList($service);
        }

        return array_values(array_unique($this->versions[$service]));
    }

    /**
     * Execute the the provider.
     *
     * @param string $type    Type of data ('api', 'waiter', 'paginator').
     * @param string $service Service name.
     * @param string $version API version.
     *
     * @return array|null
     */
    public function __invoke($type, $service, $version)
    {
        // Resolve the type or return null.
        if (isset(self::$typeMap[$type])) {
            $type = self::$typeMap[$type];
        } else {
            return null;
        }

        // Resolve the version or return null.
        if (!isset($this->versions[$service]) && !$this->hasManifest) {
            $this->buildVersionsList($service);
        }
        if (!isset($this->versions[$service][$version])) {
            return null;
        }
        $version = $this->versions[$service][$version];

        // Return the loaded API data for the specified type.
        return $this->loadApiData($type, $service, $version);
    }

    /**
     * @param string $modelsDir Directory containing service models.
     * @param array  $manifest  The API version manifest data.
     */
    private function __construct($modelsDir, array $manifest = null)
    {
        $this->hasManifest = is_array($manifest);
        $this->versions = $manifest ?: [];
        $this->modelsDir = rtrim($modelsDir, '/');
        if (!is_dir($this->modelsDir)) {
            throw new \InvalidArgumentException(
                "The specified models directory, {$modelsDir}, was not found."
            );
        }
    }

    /**
     * Build the versions list for the specified service by globbing the dir.
     */
    private function buildVersionsList($service)
    {
        $results = [];
        $len = strlen($service) + 1;
        foreach (glob("{$this->modelsDir}/{$service}-*.api.*") as $f) {
            $results[] = substr(basename($f), $len, 10);
        }

        if ($results) {
            rsort($results);
            $this->versions[$service] = ['latest' => $results[0]];
            $this->versions[$service] += array_combine($results, $results);
        } else {
            $this->versions[$service] = [];
        }
    }

    /**
     * Load the file containing the API data for the given type/service/version.
     */
    private function loadApiData($type, $service, $version)
    {
       // First check for PHP files, then fall back to JSON.
        $path = "{$this->modelsDir}/{$service}-{$version}.{$type}.php";
        if (file_exists($path)) {
            return require $path;
        }

        $path = "{$this->modelsDir}/{$service}-{$version}.{$type}.json";
        if (file_exists($path)) {
            return json_decode(file_get_contents($path), true);
        }

        return null;
    }
}
