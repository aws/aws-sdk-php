<?php
namespace Aws;

/**
 * Loads JSON files and compiles them into PHP files so that they are loaded
 * from PHP's opcode cache.
 *
 * @internal Please use Aws\load_compiled_json() instead.
 */
class JsonCompiler
{
    const CACHE_ENV = 'AWS_PHP_CACHE_DIR';

    private $cacheDir;
    private $hasOpcacheCheck;
    private $useCache;
    private $stripPath;

    /**
     * @param bool $useCache Set to false to force the cache to be disabled.
     */
    public function __construct($useCache = true)
    {
        // Because the cache path is normalized to convert windows backslashes
        // to unix style /, we must do that here as well to ensure that the
        // relative SDK directory is trimmed from the generated cache file
        // names.
        $this->stripPath = str_replace('\\', '/', __DIR__ . DIRECTORY_SEPARATOR);
        $this->useCache = $useCache && extension_loaded('Zend OPcache');
        $this->hasOpcacheCheck = $this->useCache
            && function_exists('opcache_is_script_cached');
        $this->cacheDir = getenv(self::CACHE_ENV) ?: sys_get_temp_dir();
        $this->cacheDir .= '/aws-cache-' . str_replace('.', '-', Sdk::VERSION);

        if (!is_dir($this->cacheDir)
            && !@mkdir($this->cacheDir, 0755, true)
            && !is_dir($this->cacheDir)) {
            $message = 'Unable to create cache directory: %s. Please make '
                . 'this directory writable or provide the path to a '
                . 'writable directory using the AWS_PHP_CACHE_DIR '
                . 'environment variable. Note that this cache dir may need '
                . 'to be cleared when updating the SDK in order to see '
                . 'updates.';
            throw new \RuntimeException(sprintf($message, $this->cacheDir));
        }
    }

    /**
     * Gets the JSON cache directory.
     *
     * @return string
     */
    public function getCacheDir()
    {
        return $this->cacheDir;
    }

    /**
     * Deletes all cached php files in the cache directory.
     */
    public function purge()
    {
        foreach (glob($this->cacheDir . '/*.json.php') as $file) {
            unlink($file);
        }
    }

    /**
     * Loads a JSON file from cache or from the JSON file directly.
     *
     * @param string $path Path to the JSON file to load.
     *
     * @return mixed
     */
    public function load($path)
    {
        $real = $this->normalize($path);
        if (!$this->useCache) {
            return $this->loadJsonFromFile($path, $real);
        }

        $cache = str_replace($this->stripPath, '', $real);
        $cache = str_replace(['\\', '/'], '_', $cache);
        $cache = "{$this->cacheDir}/{$cache}.php";

        if (($this->hasOpcacheCheck && opcache_is_script_cached($cache))
            || file_exists($cache)
        ) {
            return require $cache;
        }

        $data = $this->loadJsonFromFile($path, $real);
        file_put_contents($cache, "<?php return " . var_export($data, true) . ';');
        chmod($cache, 0644);

        return $data;
    }

    /**
     * Resolve relative paths without using realpath (which causes an
     * unnecessary fstat). And realpath does not work with phar files!
     *
     * @param $path
     *
     * @return string
     */
    private function normalize($path)
    {
        static $skip = ['' => true, '.' => true];
        $isPhar = substr($path, 0, 7) === 'phar://';

        if ($isPhar) {
            $path = substr($path, 7);
        }

        // Normalize path separators
        $parts = explode('/', str_replace('\\', '/', $path));

        $segments = [];
        foreach ($parts as $part) {
            if (isset($skip[$part])) {
                continue;
            } elseif ($part === '..') {
                array_pop($segments);
            } else {
                $segments[] = $part;
            }
        }

        $resolved = implode('/', $segments);

        // Add a leading slash if necessary.
        if (isset($parts[0]) && $parts[0] === '') {
            $resolved = '/' . $resolved;
        }

        return $isPhar ? 'phar://' . $resolved : $resolved;
    }

    /**
     * Loads a JSON file.
     *
     * @param string $path Provided path.
     * @param string $real Normalized path.
     *
     * @return array
     * @throw \InvalidArgumentException if file does not exist.
     */
    private function loadJsonFromFile($path, $real)
    {
        if (!file_exists($real)) {
            throw new \InvalidArgumentException(
                sprintf("File not found: %s, realpath: %s", $path, $real)
            );
        }

        return json_decode(file_get_contents($real), true);
    }
}
