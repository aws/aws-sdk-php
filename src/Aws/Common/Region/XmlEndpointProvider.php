<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Common\Region;

use Aws\Common\Exception\InvalidArgumentException;

/**
 * XML endpoint provider
 */
class XmlEndpointProvider implements EndpointProviderInterface
{
    /**
     * @var \SimpleXMLElement Parsed region and endpoint information
     */
    private $xml;

    /**
     * @var string Filename that stores the XML data locally
     */
    protected $filename;

    /**
     * Create a new RegionRepository using an XML file as the data source
     *
     * @param string $filename Path to the XML file (leave blank to use the default)
     *
     * @return self
     * @throws InvalidArgumentException if the file cannot be found
     */
    public function __construct($filename = null)
    {
        $this->filename = $filename ?: __DIR__ . '/../Resources/endpoints.xml';
        if (!is_file($this->filename)) {
            throw new InvalidArgumentException('File not found: ' . $this->filename);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getRegions($serviceName = null)
    {
        $xpath = $serviceName
            ? "Services/Service[Name=\"{$serviceName}\"]/RegionName"
            : "Regions/Region/Name";

        $regions = array();
        foreach ($this->getXml()->xpath($xpath) as $region) {
            $name = (string) $region;
            $regions[$name] = new Region($name);
        }

        return $regions;
    }

    /**
     * {@inheritdoc}
     */
    public function getServices($regionName = null)
    {
        $xpath = $regionName
            ? "Services/Service[RegionName=\"{$regionName}\"]"
            : "Services/Service";

        $services = array();
        foreach ($this->getXml()->xpath($xpath) as $service) {
            $name = (string) $service->Name;
            $services[$name] = new Service($name, (string) $service->FullName);
        }

        return $services;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpoint($serviceName, $regionName)
    {
        $xml = $this->getXml();
        $node = $xml->xpath("Services/Service[RegionName=\"{$regionName}\" and Name=\"$serviceName\"]");
        $endpointNode = $xml->xpath(
            "Regions/Region[Name=\"{$regionName}\"]/Endpoint[ServiceName=\"{$serviceName}\"]"
        );

        if (empty($node) || empty($endpointNode)) {
            throw new InvalidArgumentException(
                "Could not find an endpoint for the {$serviceName} service in the {$regionName} region"
            );
        }

        return new Endpoint(
            (string) $endpointNode[0]->Hostname,
            new Region($regionName),
            new Service($serviceName, (string) $node[0]->FullName),
            array(
                'http'  => (string) $endpointNode[0]->Http === 'true',
                'https' => (string) $endpointNode[0]->Https === 'true'
            )
        );
    }

    /**
     * Get the parsed XML data
     *
     * @return \SimpleXMLElement
     */
    protected function getXml()
    {
        if (!$this->xml) {
            $this->xml = new \SimpleXMLElement($this->filename, 0, true);
        }

        return $this->xml;
    }
}
