<?php
namespace Aws\Common\Api;

/**
 * Provides service descriptions from a directory structure.
 */
class FilesystemApiProvider implements ApiProviderInterface
{
    /** @var string */
    private $path;

    /** @var string */
    private $apiSuffix;

    /** @var array */
    private $latestVersions = [];

    /**
     * @param string $path Path to the service descriptions on disk
     * @param bool   $min  Set to true to load minified models
     */
    public function __construct($path, $min = false)
    {
        $this->path = rtrim($path, '/\\');
        $this->apiSuffix = $min ? '.normal.min.json' : '.normal.json';
    }

    public function getService($service, $version)
    {
        if ($version == 'latest') {
            $version = $this->determineLatestVersion($service);
        }

        $path = $this->getPath($service, $version, $this->apiSuffix);

        return $this->parseJsonFile($path);
    }

    public function getServiceNames()
    {
        $files = $this->getServiceFiles($this->apiSuffix);
        $search = [$this->path, $this->apiSuffix];
        $results = [];

        foreach ($files as $f) {
            $results[explode('-', str_replace($search, '', $f))[0]] = true;
        }

        return array_keys($results);
    }

    public function getServiceVersions($service)
    {
        $files = $this->getServiceFiles($this->apiSuffix);
        $search = [$this->path, $this->apiSuffix];
        $results = [];

        foreach ($files as $f) {
            if (strpos($f, $service) === 0) {
                $results[] = explode('-', str_replace($search, '', $f), 2)[1];
            }
        }

        return $results;
    }

    public function getServicePaginatorConfig($service, $version)
    {
        if ($version == 'latest') {
            $version = $this->determineLatestVersion($service);
        }

        $path = $this->getPath($service, $version, '.paginators.json');

        return $this->parseJsonFile($path);
    }

    public function getServiceWaiterConfig($service, $version)
    {
        if ($version == 'latest') {
            $version = $this->determineLatestVersion($service);
        }

        $path = $this->getPath($service, $version, '.waiters.json');

        return $this->parseJsonFile($path);
    }

    private function getPath($service, $version, $extension)
    {
        return "{$this->path}/{$service}-{$version}{$extension}";
    }

    private function getServiceFiles($suffix)
    {
        $services = [];
        $len = -1 * strlen($suffix);

        foreach (scandir($this->path) as $file) {
            if (substr($file, $len) == $suffix) {
                $services[] = $file;
            }
        }

        return $services;
    }

    private function parseJsonFile($path)
    {
        if (!file_exists($path)) {
            throw new \InvalidArgumentException("File not found: $path");
        }

        return \GuzzleHttp\json_decode(file_get_contents($path), true);
    }

    private function determineLatestVersion($service)
    {
        if (!isset($this->latestVersions[$service])) {
            if ($versions = $this->getServiceVersions($service)) {
                rsort($versions);
                $this->latestVersions[$service] = $versions[0];
            } else {
                throw new \RuntimeException('There are no versions of the '
                    . $service . ' service available.');
            }
        }

        return $this->latestVersions[$service];
    }
}
