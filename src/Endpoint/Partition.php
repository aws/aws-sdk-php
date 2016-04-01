<?php
namespace Aws\Endpoint;

use InvalidArgumentException as Iae;

/**
 * @internal
 */
final class Partition implements \ArrayAccess
{
    private $definition;

    public function __construct(array $definition)
    {
        foreach (['partition', 'regions', 'services', 'dnsSuffix'] as $key) {
            if (!isset($definition[$key])) {
                throw new Iae("Partition missing required $key field");
            }
        }

        $this->definition = $definition;
    }

    public function toArray()
    {
        return $this->definition;
    }

    public function offsetGet($offset)
    {
        return isset($this->definition[$offset])
            ? $this->definition[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        $this->definition[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->definition[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->definition[$offset]);
    }

    /**
     * Determine if this partition contains the provided region.
     *
     * @param string $region
     *
     * @return bool
     */
    public function matchesRegion($region)
    {
        if (isset($this->definition['regions'][$region])) {
            return true;
        }

        if (isset($this->definition['regionRegex'])) {
            return (bool) preg_match(
                "@{$this->definition['regionRegex']}@",
                $region
            );
        }

        return false;
    }

    public function getRegionsForService($service)
    {
        if ($this->isServicePartitionGlobal($service)) {
            return [$this->getPartitionEndpoint($service)];
        }

        if (isset($this->definition['services'][$service]['endpoints'])) {
            $serviceRegions = array_keys(
                $this->definition['services'][$service]['endpoints']
            );

            return array_intersect($serviceRegions, array_keys(
                $this->definition['regions']
            ));
        }

        return [];
    }

    public function __invoke(array $args = [])
    {
        $service = isset($args['service']) ? $args['service'] : '';
        $region = isset($args['region']) ? $args['region'] : '';
        $scheme = isset($args['scheme']) ? $args['scheme'] : 'https';
        $data = $this->getEndpointData($service, $region);

        return [
            'endpoint' => "{$scheme}://" . $this->formatEndpoint(
                    isset($data['hostname']) ? $data['hostname'] : '',
                    $service,
                    $region
                ),
            'signatureVersion' => $this->getSignatureVersion($data),
            'signingRegion' => isset($data['credentialScope']['region'])
                ? $data['credentialScope']['region']
                : $region,
            'signingName' => isset($data['credentialScope']['service'])
                ? $data['credentialScope']['service']
                : $service,
        ];
    }

    private function getEndpointData($service, $region)
    {

        $resolvedRegion = $this->resolveRegion($service, $region);
        $data = isset($this->definition['services'][$service]['endpoints'][$resolvedRegion])
            ? $this->definition['services'][$service]['endpoints'][$resolvedRegion]
            : [];
        $data += isset($this->definition['services'][$service]['defaults'])
            ? $this->definition['services'][$service]['defaults']
            : [];
        $data += isset($this->definition['defaults'])
            ? $this->definition['defaults']
            : [];

        return $data;
    }

    private function getSignatureVersion(array $data)
    {
        static $supportedBySdk = [
            's3v4',
            'v4',
            'anonymous',
        ];

        $possibilities = array_intersect(
            $supportedBySdk,
            isset($data['signatureVersions'])
                ? $data['signatureVersions']
                : ['v4']
        );

        return array_shift($possibilities);
    }

    private function resolveRegion($service, $region)
    {
        if ($this->isServicePartitionGlobal($service)) {
            return $this->getPartitionEndpoint($service);
        }

        return $region;
    }

    private function isServicePartitionGlobal($service)
    {
        return isset($this->definition['services'][$service]['isRegionalized'])
            && false === $this->definition['services'][$service]['isRegionalized'];
    }

    private function getPartitionEndpoint($service)
    {
        return $this->definition['services'][$service]['partitionEndpoint'];
    }

    private function formatEndpoint($template, $service, $region)
    {
        return strtr($template, [
            '{service}' => $service,
            '{region}' => $region,
            '{dnsSuffix}' => $this->definition['dnsSuffix'],
        ]);
    }
}
