<?php
namespace Aws;

class FileCache implements CacheInterface
{
    private $cacheDir;

    public function __construct()
    {
        $this->cacheDir = (new JsonCompiler)->getCacheDir();
    }

    public function set($key, $data, $ttl = 0)
    {
        $toSave = ['data' => $data];
        $path = $this->getCachePath($key);
        if ($ttl) {
            $toSave['expiration'] = time() + $ttl;
        }

        if (@mkdir(dirname($path), 0777, true)) {
            file_put_contents($path, \serialize($toSave), LOCK_EX);
        }
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

        return null;
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
