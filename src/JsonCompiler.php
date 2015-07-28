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
    /** @var ClearableCacheInterface|null */
    private $cache;

    /**
     * @param bool $useCache Set to false to force the cache to be disabled.
     */
    public function __construct($useCache = true)
    {
        if ($useCache) {
            $dir = getenv(FileCache::CACHE_ENV) ?: sys_get_temp_dir();
            $dir .= '/aws-cache-' . str_replace('.', '-', Sdk::VERSION);
            $this->cache = new FileCache($dir);
        }
    }

    /**
     * Deletes all cached php files in the cache directory.
     */
    public function purge()
    {
        if ($this->cache) {
            $this->cache->purge();
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
        if (empty($this->cache)) {
            return $this->loadJsonFromFile($path, $real);
        }

        if ($cached = $this->cache->get($real)) {
            return $cached;
        }

        $data = $this->loadJsonFromFile($path, $real);
        $this->cache->set($real, $data);

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
