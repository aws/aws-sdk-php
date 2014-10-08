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
class CachingApiProvider
{
    /** @var string */
    private $cacheDir;

    /** @var callable */
    private $provider;

    /**
     * @param callable    $provider Provider to wrap
     * @param string|bool $cacheDir Path to where the compiled PHP scripts are
     *                              stored on disk. Pass true to store the
     *                              files in the system's temp directory.
     *
     * @throws \RuntimeException if the cache directory cannot be found and
     *                           it cannot be created.
     * @throws \InvalidArgumentException
     */
    public function __construct(callable $provider, $cacheDir = true)
    {
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

    public function __invoke($type, $service, $version)
    {
        $filename = $this->cacheDir . '/'
            . strtolower($type) . '_' . $service . '_' . $version . '.php';

        if (file_exists($filename)) {
            return require $filename;
        }

        $data = call_user_func($this->provider, $type, $service, $version);
        // Save the file to the cache directory as PHP code
        file_put_contents($filename, '<?php return ' . var_export($data, true) . ';');

        return $data;
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
}
