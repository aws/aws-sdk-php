<?php
namespace Aws\Common\Api\Provider;

/**
 * Provides service descriptions from a compile PHP script cache.
 *
 * This provider is used to wrap other API providers. When a JSON file is
 * requested, this provider will compile the JSON into PHP code and store it
 * on disk. This allows PHP applications using an OPcode cache to store the
 * data in memory and not need to cache the script on each request.
 */
class CachingApiProvider implements ApiProviderInterface
{
    /** @var string */
    private $cacheDir;

    /** @var ApiProviderInterface */
    private $provider;

    /**
     * @param ApiProviderInterface $provider Provider to wrap
     * @param string|bool          $cacheDir Path to where the compiled PHP
     *                                       scripts are stored on disk. Pass
     *                                       true to store the files in the
     *                                       system's temp directory.
     * @throws \RuntimeException if the cache directory cannot be found and
     *                           it cannot be created.
     * @throws \InvalidArgumentException
     */
    public function __construct(
        ApiProviderInterface $provider,
        $cacheDir = true
    ) {
        $this->provider = $provider;

        if ($cacheDir === true) {
            $this->cacheDir = sys_get_temp_dir() . '/aws-cache';
        } elseif (is_string($cacheDir)) {
            $this->cacheDir = rtrim($cacheDir, '/') . '/';
        } else {
            throw new \InvalidArgumentException('Invalid cache directory');
        }

        if (!is_dir($this->cacheDir) && !mkdir($this->cacheDir, 0777, true)) {
            throw new \RuntimeException('Unable to create cache directory');
        }
    }

    public function getServiceNames()
    {
        return $this->provider->getServiceNames();
    }

    public function getServiceVersions($service)
    {
        return $this->provider->getServiceVersions($service);
    }

    public function getService($service, $version)
    {
        return $this->getCache('getService', $service, $version);
    }

    public function getServicePaginatorConfig($service, $version)
    {
        return $this->getCache('getServicePaginatorConfig', $service, $version);
    }

    public function getServiceWaiterConfig($service, $version)
    {
        return $this->getCache('getServiceWaiterConfig', $service, $version);
    }

    /**
     * Clears the cache directory by deleting each .php file.
     */
    public function clearCache()
    {
        if (!is_dir($this->cacheDir)) {
            return;
        }

        foreach (scandir($this->cacheDir) as $file) {
            $file = $this->cacheDir . '/' . $file;
            if (is_file($file)
                && substr($file, -4) == '.php'
                && !unlink($file)
            ) {
                throw new \RuntimeException("Unable to delete file: {$file}");
            }
        }
    }

    private function getCache($method, $service, $version)
    {
        $filename = $this->cacheDir . '/'
            . strtolower($method) . '_' . $service . '_' . $version . '.php';

        if (file_exists($filename)) {
            return require $filename;
        }

        $data = $this->provider->{$method}($service, $version);

        // Save the file to the cache directory as PHP code
        file_put_contents(
            $filename,
            '<?php return ' . var_export($data, true) . ';'
        );

        return $data;
    }
}
