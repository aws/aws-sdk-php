<?php
namespace Aws\S3;

use Aws\Arn\ArnInterface;
use Aws\Endpoint\PartitionEndpointProvider;

/**
 * @internal
 */
trait EndpointRegionHelperTrait
{
    private function getPartitionSuffix(
        ArnInterface $arn,
        PartitionEndpointProvider $provider
    ) {
        $partition = $provider->getPartition(
            $arn->getRegion(),
            $arn->getService()
        );
        return $partition->getDnsSuffix();
    }

    private function getSigningRegion(
        $region,
        $service,
        PartitionEndpointProvider $provider
    ) {
        $partition = $provider->getPartition($region, $service);
        $data = $partition->toArray();
        if (isset($data['services'][$service]['endpoints'][$region]['credentialScope']['region'])) {
            return $data['services'][$service]['endpoints'][$region]['credentialScope']['region'];
        }
        return $region;
    }

    private function isFipsPseudoRegion($region)
    {
        return strpos($region, 'fips-') !== false || strpos($region, '-fips') !== false;
    }

    private function isMatchingSigningRegion(
        $arnRegion,
        $clientRegion,
        $service,
        PartitionEndpointProvider $provider
    ) {
        $arnRegion = $this->stripPseudoRegions(strtolower($arnRegion));
        $clientRegion = $this->stripPseudoRegions(strtolower($clientRegion));
        if ($arnRegion === $clientRegion) {
            return true;
        }
        if ($this->getSigningRegion($clientRegion, $service, $provider) === $arnRegion) {
            return true;
        }
        return false;
    }

    private function stripPseudoRegions($region)
    {
        return str_replace(['fips-', '-fips'], ['', ''], $region);
    }
}
