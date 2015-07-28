<?php
namespace Aws;

class FileCache implements ClearableCacheInterface
{
    const CACHE_ENV = 'AWS_PHP_CACHE_DIR';

    /** @var string */
    private $cacheDir;
    /** @var bool */
    private $hasOpcache;

    /**
     * @param string $directory
     */
    public function __construct($directory = '')
    {
        $this->cacheDir = $directory
            ?: (getenv(self::CACHE_ENV)
                ?: sys_get_temp_dir() . '/aws-sdk-cache-' . getmyuid()
            );
        $this->hasOpcache = extension_loaded('Zend OPcache')
            && function_exists('opcache_is_script_cached');

        if (empty($this->cacheDir)
            || !$this->initializeDirectory($this->cacheDir)
        ) {
            $message = 'Unable to create cache directory: %s. Please make '
                . 'this directory writable or provide the path to a '
                . 'writable directory using the AWS_PHP_CACHE_DIR '
                . 'environment variable.';
            throw new \RuntimeException(sprintf($message, $directory));
        }
    }

    public function set($key, $data, $ttl = 0)
    {
        $toSave = ['data' => $data];
        $path = $this->getCachePath($key);
        if ($ttl) {
            $toSave['expiration'] = time() + $ttl;
        }
        $toSave = '<?php return ' . var_export($toSave, true) . ';';

        return $this->initializeDirectory(dirname($path))
            && file_put_contents($path, $toSave, LOCK_EX) > 0;
    }

    public function remove($key)
    {
        $path = $this->getCachePath($key);
        unlink($path);

        if ($this->hasOpcache) {
            opcache_invalidate($path);
        }
    }

    public function get($key)
    {
        $path = $this->getCachePath($key);

        if ($retrieved = @include $path) {
            if (isset($retrieved['data']) &&
                (empty($retrieved['expiration']) || $retrieved['expiration'] > time())
            ) {
                return $retrieved['data'];
            }

            $this->remove($key);
        }
    }

    public function purge()
    {
        foreach (glob($this->cacheDir . '/**/**/*.cache.php') as $file) {
            unlink($file);
        }
    }


    private function getCachePath($key)
    {
        $key = md5($key);

        return implode(DIRECTORY_SEPARATOR, [
            $this->cacheDir,
            substr($key, 0, 2),
            substr($key, 2, 2),
            "$key.cache.php",
        ]);
    }

    private function initializeDirectory($dir)
    {
        if (is_dir($dir) || (@mkdir($dir, 0755, true) || is_dir($dir))) {
            return true;
        }

        return false;
    }
}
