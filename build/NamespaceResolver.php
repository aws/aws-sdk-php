<?php

/**
 * Derives the client namespace (and client class prefix) for a service from
 * its API model.
 *
 * The namespace is `ucwords(serviceId)` with the spaces removed, unless
 * src/data/service-namespaces.json has an entry for that `serviceId`. The
 * table is keyed by `serviceId`. An entry exists for one of two reasons:
 *   1. The service shipped with that namespace before namespaces were
 *      derived from `serviceId`.
 *   2. The derived namespace collided with an existing one, and a different
 *      namespace was agreed with the service team.
 *
 * Namespaces are public. Never change an entry while the service ships;
 * remove an entry only when the service's models are removed from src/data.
 */
class NamespaceResolver
{
    /** @var array<string, string> serviceId => namespace */
    private array $serviceNamespaces;

    /** @var array<string, string> lowercased namespace => serviceId */
    private array $serviceIdsByNamespace = [];

    /** @var array<string, string> lowercased directory name => directory name */
    private array $possibleNamespaces = [];

    public function __construct(string $sdkRoot)
    {
        $file = "$sdkRoot/src/data/service-namespaces.json";
        $table = json_decode((string) @file_get_contents($file), true);
        if (!is_array($table['service-namespaces'] ?? null)
            || $table['service-namespaces'] === []
        ) {
            throw new \RuntimeException(
                "Cannot read the service namespace table from $file"
            );
        }
        $this->serviceNamespaces = $table['service-namespaces'];
        foreach ($this->serviceNamespaces as $serviceId => $ns) {
            $this->serviceIdsByNamespace[strtolower($ns)] = $serviceId;
        }

        // A service namespace is a directory under src/ that holds a client.
        foreach (scandir("$sdkRoot/src") as $dir) {
            if (is_file("$sdkRoot/src/$dir/{$dir}Client.php")) {
                $this->possibleNamespaces[strtolower($dir)] = $dir;
            }
        }
    }

    /**
     * Derives the namespace from `serviceId`. This is the value used for
     * changelog categories and for a service that is not in the SDK yet
     * (for example when generating a new service stub); it does not check
     * that a directory for it exists under src/.
     *
     * @param array $metadata The `metadata` object of an api-2.json model.
     *
     * @throws \InvalidArgumentException if the model has no `serviceId`.
     * @throws \RuntimeException if the derived namespace is already used by
     *     an entry in the table for another service.
     */
    public function derive(array $metadata): string
    {
        if (empty($metadata['serviceId'])) {
            throw new \InvalidArgumentException(
                'Cannot derive a namespace: metadata.serviceId is missing'
                . ' (endpointPrefix: '
                . ($metadata['endpointPrefix'] ?? 'unknown') . ')'
            );
        }
        $serviceId = $metadata['serviceId'];

        if (isset($this->serviceNamespaces[$serviceId])) {
            return $this->serviceNamespaces[$serviceId];
        }

        $ns = str_replace(' ', '', ucwords($serviceId));
        if (isset($this->serviceIdsByNamespace[strtolower($ns)])) {
            throw new \RuntimeException(sprintf(
                "serviceId '%s' derives the namespace '%s', which is already"
                . " used by serviceId '%s' in service-namespaces.json. Record"
                . " a different namespace for '%s' in that table.",
                $serviceId,
                $ns,
                $this->serviceIdsByNamespace[strtolower($ns)],
                $serviceId
            ));
        }

        return $ns;
    }

    /**
     * Resolves the namespace of a service that ships in the SDK, using the
     * exact casing of its directory under src/.
     *
     * @param array $metadata The `metadata` object of an api-2.json model.
     *
     * @throws \RuntimeException if no client directory under src/ matches
     *     the namespace.
     */
    public function resolve(array $metadata): string
    {
        $ns = $this->derive($metadata);

        if (!isset($this->possibleNamespaces[strtolower($ns)])) {
            throw new \RuntimeException('NS not found: ' . $ns);
        }

        return $this->possibleNamespaces[strtolower($ns)];
    }
}
