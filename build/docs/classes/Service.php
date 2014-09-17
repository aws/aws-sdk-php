<?php
namespace Aws\Build\Docs;

use Aws\Common\Api\Service as Api;

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

    public function __construct($name, Api $api, DocModel $docs)
    {
        $this->api = $api;
        $this->name = $name;
        $this->namespace = $this->getServiceNamespace($name);
        $this->version = $api->getApiVersion();
        $this->docs = $docs;
        $this->slug = $name . '-' . $this->version;
        $this->clientName = $this->namespace . 'Client';
        $this->client = 'Aws\\' . $this->namespace . '\\' . $this->clientName;
        $this->clientLink = 'Aws/' . $this->namespace . '/' . $this->namespace . 'Client.html';
        $this->namespaceLink = 'Aws/' . $this->namespace . '.html';
        $this->serviceLink = 'Aws/' . $this->namespace . '/' . $this->slug . '.html';
        $this->shortTitle = $api->getMetadata('serviceAbbreviation');
        $this->title = $api->getServiceFullName();
        $this->fullNamespace = 'Aws\\' . $this->namespace;
        $this->fullTitle = $this->title . ' (' . $this->version . ')';
    }

    private function getServiceNamespace($service)
    {
        static $namespaces;
        if (!$namespaces) {
            // Get the namespaces from the Aws\Sdk class from a private property.
            $property = (new \ReflectionClass('Aws\Sdk'))->getProperty('services');
            $property->setAccessible(true);
            $namespaces = $property->getValue(null);
        }

        if (!isset($namespaces[$service])) {
            throw new \RuntimeException("Could not determine the namespace for {$service}.");
        }
        return $namespaces[$service];
    }
}
