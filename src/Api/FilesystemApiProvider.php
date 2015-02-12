<?php
namespace Aws\Api;

use Aws\Exception\UnresolvedApiException;
use GuzzleHttp\Utils;

/**
 * Provides service descriptions data from a directory structure.
 */
class FilesystemApiProvider
{
    /** @var string */
    private $path;

    /** @var array */
    private $latestVersions = [];

    /**
     * @param string $path     Path to the service description files on disk.
     * @throws \InvalidArgumentException if the path is not found.
     */
    public function __construct($path)
    {
        $this->path = rtrim($path, '/\\');

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
        if ($version == 'latest') {
            $version = $this->determineLatestVersion($service);
        }

        switch ($type) {
            case 'api':
                return $this->load($service, $version, 'api');
            case 'paginator':
                return $this->load($service, $version, 'paginators');
            case 'waiter':
                return $this->load($service, $version, 'waiters2');
            default:
                throw new \InvalidArgumentException("Unknown type: $type");
        }
    }

    public function getServiceVersions($service)
    {
        $results = [];
        $len = strlen($service) + 1;
        foreach (glob("{$this->path}/{$service}-*.api.*") as $f) {
            $results[] = substr(basename($f), $len, 10);
        }

        return $results;
    }

    /**
     * @return array
     */
    private function load($service, $version, $type)
    {
        // First check for PHP files, then fall back to JSON.
        $path = "{$this->path}/{$service}-{$version}.{$type}.php";

        if (file_exists($path)) {
            return require $path;
        }

        $path = "{$this->path}/{$service}-{$version}.{$type}.json";
        if (file_exists($path)) {
            return Utils::jsonDecode(file_get_contents($path), true);
        }

        throw new UnresolvedApiException("Cannot find file: $path");
    }

    private function determineLatestVersion($service)
    {
        if (!isset($this->latestVersions[$service])) {
            if ($versions = $this->getServiceVersions($service)) {
                rsort($versions);
                $this->latestVersions[$service] = $versions[0];
            } else {
                throw new UnresolvedApiException("There are no versions of the "
                    . "\"$service\" service available.");
            }
        }

        return $this->latestVersions[$service];
    }
}
