<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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
use Guzzle\Common\Exception\RuntimeException;
use Guzzle\Http\ClientInterface;
use Guzzle\Http\Client;

/**
 * XML endpoint provider
 */
class XmlEndpointProvider implements EndpointProviderInterface
{
    /**
     * @var string Default URL used to store the most up to date regions and endpoints data
     */
    const CLOUDFRONT_URL = 'http://aws-sdk-configurations.amazonwebservices.com/endpoints.xml';

    /**
     * @var \SimpleXMLElement Parsed region and endpoint information
     */
    private $xml;

    /**
     * @var ClientInterface Client used to refresh the endpoint file
     */
    protected $client;

    /**
     * @var string Filename that stores the XML data locally
     */
    protected $filename;

    /**
     * Create a new RegionRepository using an XML file as the data source
     *
     * @param string          $filename Path to the XML file
     * @param ClientInterface $client   Client used to refresh the regions file if needed
     *
     * @return self
     */
    public function __construct($filename = null, ClientInterface $client = null)
    {
        $this->filename = $filename ?: __DIR__ . '/../../../../vendor/aws/regions/endpoints.xml';
        $this->client = $client;
    }

    /**
     * Attempt to download a new endpoints file and save it to disk
     *
     * @return self
     * @throws RuntimeException if the XML data cannot be downloaded from Amazon S3
     * @throws RuntimeException if the downloaded XML data cannot be written to the filesystem
     */
    public function fetchEndpoints()
    {
        // @codeCoverageIgnoreStart
        $dir = dirname($this->filename);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        // @codeCoverageIgnoreEnd

        $xml = $this->getClient()->get(static::CLOUDFRONT_URL)->send()->getBody(true);

        if (!$xml) {
            // @codeCoverageIgnoreStart
            throw new RuntimeException('Could not download the endpoint file from ' . static::CLOUDFRONT_URL);
            // @codeCoverageIgnoreEnd
        }

        if (!file_put_contents($this->filename, $xml)) {
            // @codeCoverageIgnoreStart
            throw new RuntimeException('Unable to save the downloaded XML endpoint file to ' . $this->filename);
            // @codeCoverageIgnoreEnd
        }

        return $this;
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
     * Get the client used to retrieve the updated endpoints file
     *
     * @return ClientInterface
     */
    protected function getClient()
    {
        // @codeCoverageIgnoreStart
        if (!$this->client) {
            $this->client = new Client();
        }
        // @codeCoverageIgnoreEnd

        return $this->client;
    }

    /**
     * Get the parsed XML data
     *
     * @return \SimpleXMLElement
     */
    protected function getXml()
    {
        if (!$this->xml) {
            // If the file doesn't exist then attempt to download the file and store it locally
            if (!file_exists($this->filename)) {
                $this->fetchEndpoints();
            }
            $this->xml = new \SimpleXMLElement($this->filename, 0, true);
        }

        return $this->xml;
    }
}
