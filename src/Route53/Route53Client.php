<?php
namespace Aws\Route53;

use Aws\AwsClient;
use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **Amazon Route 53** service.
 *
 * @method \Aws\Result associateVPCWithHostedZone(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateVPCWithHostedZoneAsync(array $args = [])
 * @method \Aws\Result changeResourceRecordSets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise changeResourceRecordSetsAsync(array $args = [])
 * @method \Aws\Result changeTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise changeTagsForResourceAsync(array $args = [])
 * @method \Aws\Result createHealthCheck(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createHealthCheckAsync(array $args = [])
 * @method \Aws\Result createHostedZone(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createHostedZoneAsync(array $args = [])
 * @method \Aws\Result createReusableDelegationSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createReusableDelegationSetAsync(array $args = [])
 * @method \Aws\Result deleteHealthCheck(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHealthCheckAsync(array $args = [])
 * @method \Aws\Result deleteHostedZone(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHostedZoneAsync(array $args = [])
 * @method \Aws\Result deleteReusableDelegationSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReusableDelegationSetAsync(array $args = [])
 * @method \Aws\Result disassociateVPCFromHostedZone(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateVPCFromHostedZoneAsync(array $args = [])
 * @method \Aws\Result getChange(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getChangeAsync(array $args = [])
 * @method \Aws\Result getCheckerIpRanges(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCheckerIpRangesAsync(array $args = [])
 * @method \Aws\Result getGeoLocation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getGeoLocationAsync(array $args = [])
 * @method \Aws\Result getHealthCheck(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getHealthCheckAsync(array $args = [])
 * @method \Aws\Result getHealthCheckCount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getHealthCheckCountAsync(array $args = [])
 * @method \Aws\Result getHealthCheckLastFailureReason(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getHealthCheckLastFailureReasonAsync(array $args = [])
 * @method \Aws\Result getHealthCheckStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getHealthCheckStatusAsync(array $args = [])
 * @method \Aws\Result getHostedZone(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getHostedZoneAsync(array $args = [])
 * @method \Aws\Result getHostedZoneCount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getHostedZoneCountAsync(array $args = [])
 * @method \Aws\Result getReusableDelegationSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getReusableDelegationSetAsync(array $args = [])
 * @method \Aws\Result listGeoLocations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listGeoLocationsAsync(array $args = [])
 * @method \Aws\Result listHealthChecks(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listHealthChecksAsync(array $args = [])
 * @method \Aws\Result listHostedZones(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listHostedZonesAsync(array $args = [])
 * @method \Aws\Result listHostedZonesByName(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listHostedZonesByNameAsync(array $args = [])
 * @method \Aws\Result listResourceRecordSets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceRecordSetsAsync(array $args = [])
 * @method \Aws\Result listReusableDelegationSets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listReusableDelegationSetsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listTagsForResources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourcesAsync(array $args = [])
 * @method \Aws\Result updateHealthCheck(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHealthCheckAsync(array $args = [])
 * @method \Aws\Result updateHostedZoneComment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHostedZoneCommentAsync(array $args = [])
 */
class Route53Client extends AwsClient
{
    public function __construct(array $args)
    {
        parent::__construct($args);
        $this->getHandlerList()->appendInit($this->cleanIdFn(), 'route53.clean_id');
    }

    private function cleanIdFn()
    {
        return function (callable $handler) {
            return function (CommandInterface $c, RequestInterface $r = null) use ($handler) {
                foreach (['Id', 'HostedZoneId'] as $clean) {
                    if ($c->hasParam($clean)) {
                        $c[$clean] = $this->cleanId($c[$clean]);
                    }
                }
                return $handler($c, $r);
            };
        };
    }

    private function cleanId($id)
    {
        static $toClean = ['/hostedzone/', '/change/', '/delegationset/'];

        return str_replace($toClean, '', $id);
    }
}
