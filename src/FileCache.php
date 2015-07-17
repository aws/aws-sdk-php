<?php
namespace Aws;

class FileCache implements CacheInterface
{
    private $cacheDir;

    /**
     * @param string $directory
     */
    public function __construct($directory = '')
    {
        $this->cacheDir = $directory ?: (new JsonCompiler)->getCacheDir();
    }

    public function set($key, $data, $ttl = 0)
    {
        $toSave = ['data' => $data];
        $path = $this->getCachePath($key);
        $dir = dirname($path);
        if ($ttl) {
            $toSave['expiration'] = time() + $ttl;
        }

        if (!is_dir($dir)) {
            if (false === @mkdir($dir, 0777, true) && !is_dir($dir)) {
                return;
            }
        }

        file_put_contents($path, \serialize($toSave), LOCK_EX);
    }

    public function remove($key)
    {
        unlink($this->getCachePath($key));
    }

    public function get($key)
    {
        $path = $this->getCachePath($key);

        if (file_exists($path) && $retrieved = @file_get_contents($path)) {
            $cached = \unserialize($retrieved);
            if (isset($cached['data']) &&
                (empty($cached['expiration']) || $cached['expiration'] > time())
            ) {
                return $cached['data'];
            }

            $this->remove($key);
        }
    }


    private function getCachePath($key)
    {
        $key = md5($key);

        return implode(DIRECTORY_SEPARATOR, [
            $this->cacheDir,
            substr($key, 0, 2),
            substr($key, 2, 2),
            "$key.cache",
        ]);
    }
}
