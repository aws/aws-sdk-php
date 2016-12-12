<?php
namespace Aws\Build\Docs;

use Aws\Api\Service as Api;
use Aws\Api\DocModel;
use Aws\Sdk;

/**
 * Serves as a DTO for information about a service required to build various
 * aspects of the docs.
 *
 * @internal
 */
class Service
{
    /** @var Api */
    public $api;

    /** @var string */
    public $client;

    /** @var string */
    public $clientName;

    /** @var string */
    public $clientLink;

    /** @var DocModel */
    public $docs;

    /** @var string */
    public $fullNamespace;

    /** @var string */
    public $fullTitle;

    /** @var string */
    public $name;

    /** @var string */
    public $namespace;

    /** @var string */
    public $namespaceLink;

    /** @var string */
    public $serviceLink;

    /** @var string */
    public $shortTitle;

    /** @var string */
    public $slug;

    /** @var string */
    public $title;

    /** @var string */
    public $version;

    public function __construct(Api $api, DocModel $docs)
    {
        $this->name = $api->getServiceName();
        $this->api = $api;
        $this->namespace = $this->getServiceNamespace($this->name);
        $this->version = $api->getApiVersion();
        $this->docs = $docs;
        $this->slug = $this->name . '-' . $this->version;
        $this->uid = $api->getUid();
        $this->clientName = $this->namespace . 'Client';
        $this->client = 'Aws\\' . $this->namespace . '\\' . $this->clientName;
        $this->clientLink = 'class-Aws.' . $this->namespace . '.' . $this->namespace . 'Client.html';
        $this->namespaceLink = 'namespace-Aws.' . $this->namespace . '.html';
        $this->serviceLink = 'api-' . $this->slug . '.html';
        $this->shortTitle = $api->getMetadata('serviceAbbreviation');
        $this->title = $api->getServiceFullName();
        $this->fullNamespace = 'Aws\\' . $this->namespace;
        $this->fullTitle = $this->title . ' (' . $this->version . ')';
    }

    private function getServiceNamespace($service)
    {
        static $namespaces;

        if (!$namespaces) {
            // Get the namespaces from the directories.
            foreach (glob(__DIR__ . '/../../../src/*') as $dir) {
                $base = basename($dir);
                if (class_exists("Aws\\{$base}\\{$base}Client")) {
                    $namespaces[Sdk::getEndpointPrefix($base)] = $base;
                }
            }
        }

        if (!isset($namespaces[$service])) {
            throw new \RuntimeException("Could not determine the namespace for {$service}.");
        }

        return $namespaces[$service];
    }
}
