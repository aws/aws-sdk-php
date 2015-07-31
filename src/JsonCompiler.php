<?php
namespace Aws;

/**
 * Loads JSON files and caches them.
 *
 * @internal Please use Aws\load_compiled_json() instead.
 */
class JsonCompiler
{
    /** @var ClearableCacheInterface|null */
    private $cache;

    /**
     * @param ClearableCacheInterface|bool  $cache  The cache to use to store
     *  compiled JSON (or true to use the default file cache).
     */
    public function __construct($cache = true)
    {
        if ($cache instanceof ClearableCacheInterface) {
            $this->cache = $cache;
        } elseif (true === $cache) {
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
        if (empty($this->cache)) {
            return $this->loadJsonFromFile($path);
        }

        if ($cached = $this->cache->get($path)) {
            return $cached;
        }

        $data = $this->loadJsonFromFile($path);
        $this->cache->set($path, $data);

        return $data;
    }

    /**
     * Loads a JSON file.
     *
     * @param string $path Provided path.
     *
     * @return array
     * @throw \InvalidArgumentException if file does not exist.
     */
    private function loadJsonFromFile($path)
    {
        if (!file_exists($path)) {
            throw new \InvalidArgumentException(
                sprintf("File not found: %s, realpath: %s", $path, realpath($path))
            );
        }

        return json_decode(file_get_contents($path), true);
    }
}
