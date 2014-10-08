<?php
namespace Aws\Common\Api\Provider;

use GuzzleHttp\Utils;

/**
 * Provides service descriptions data from a directory structure.
 */
class FilesystemApiProvider
{
    /** @var string */
    private $path;

    /** @var string */
    private $apiSuffix;

    /** @var array */
    private $latestVersions = [];

    /**
     * @param string $path      Path to the service description files
     * @param string $apiSuffix Determines which file type to load.
     * @throws \InvalidArgumentException if the path is not found.
     */
    public function __construct($path, $apiSuffix = '.api.json')
    {
        $this->path = rtrim($path, '/\\');
        $this->apiSuffix = $apiSuffix;

        if (!is_dir($path)) {
            throw new \InvalidArgumentException("Path not found: $path");
        }
    }

    /**
     * Gets description data for the given type, service, and version as a
     * JSON decoded associative array structure.
     *
     * @param string $type    Type of document to retrieve. For example: api,
     *                        waiter, paginator, etc.
     * @param string $service Service to retrieve.
     * @param string $version Version of the document to retrieve.
     *
     * @return array
     * @throws \InvalidArgumentException when the type is unknown.
     */
    public function __invoke($type, $service, $version)
    {
        switch ($type) {
            case 'api':
                return $this->getService($service, $version);
            case 'paginator':
                return $this->getServicePaginatorConfig($service, $version);
            case 'waiter':
                return $this->getServiceWaiterConfig($service, $version);
            default:
                throw new \InvalidArgumentException('Unknown type: ' . $type);
        }
    }

    private function getService($service, $version)
    {
        if ($version == 'latest') {
            $version = $this->determineLatestVersion($service);
        }

        $path = $this->getPath($service, $version, $this->apiSuffix);

        return Utils::jsonDecode(file_get_contents($path), true);
    }

    private function getServicePaginatorConfig($service, $version)
    {
        if ($version == 'latest') {
            $version = $this->determineLatestVersion($service);
        }

        $path = $this->getPath($service, $version, '.paginators.json');

        return Utils::jsonDecode(file_get_contents($path), true);
    }

    private function getServiceWaiterConfig($service, $version)
    {
        if ($version == 'latest') {
            $version = $this->determineLatestVersion($service);
        }

        $path = $this->getPath($service, $version, '.waiters.json');

        return Utils::jsonDecode(file_get_contents($path), true);
    }

    public function getServiceVersions($service)
    {
        $files = $this->getServiceFiles($this->apiSuffix);
        $search = [$this->path, $this->apiSuffix];
        $results = [];
        $needle = $service . '-';

        foreach ($files as $f) {
            if (strpos($f, $needle) === 0) {
                $results[] = substr(str_replace($search, '', $f), strlen($needle));
            }
        }

        return $results;
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
