<?php
namespace Aws\ElasticLoadBalancingV2;

use Aws\AwsClient;
use Aws\Command;
use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **Elastic Load Balancing** service.
 * @method \Aws\Result addTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @method \Aws\Result createListener(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createListenerAsync(array $args = [])
 * @method \Aws\Result createLoadBalancer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoadBalancerAsync(array $args = [])
 * @method \Aws\Result createRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @method \Aws\Result createTargetGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createTargetGroupAsync(array $args = [])
 * @method \Aws\Result deleteListener(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteListenerAsync(array $args = [])
 * @method \Aws\Result deleteLoadBalancer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoadBalancerAsync(array $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @method \Aws\Result deleteTargetGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTargetGroupAsync(array $args = [])
 * @method \Aws\Result deregisterTargets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterTargetsAsync(array $args = [])
 * @method \Aws\Result describeListeners(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeListenersAsync(array $args = [])
 * @method \Aws\Result describeLoadBalancerAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoadBalancerAttributesAsync(array $args = [])
 * @method \Aws\Result describeLoadBalancers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoadBalancersAsync(array $args = [])
 * @method \Aws\Result describeRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRulesAsync(array $args = [])
 * @method \Aws\Result describeSSLPolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSSLPoliciesAsync(array $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @method \Aws\Result describeTargetGroupAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTargetGroupAttributesAsync(array $args = [])
 * @method \Aws\Result describeTargetGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTargetGroupsAsync(array $args = [])
 * @method \Aws\Result describeTargetHealth(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTargetHealthAsync(array $args = [])
 * @method \Aws\Result modifyListener(array $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyListenerAsync(array $args = [])
 * @method \Aws\Result modifyLoadBalancerAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyLoadBalancerAttributesAsync(array $args = [])
 * @method \Aws\Result modifyRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyRuleAsync(array $args = [])
 * @method \Aws\Result modifyTargetGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyTargetGroupAsync(array $args = [])
 * @method \Aws\Result modifyTargetGroupAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyTargetGroupAttributesAsync(array $args = [])
 * @method \Aws\Result registerTargets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise registerTargetsAsync(array $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @method \Aws\Result setIpAddressType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise setIpAddressTypeAsync(array $args = [])
 * @method \Aws\Result setRulePriorities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise setRulePrioritiesAsync(array $args = [])
 * @method \Aws\Result setSecurityGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise setSecurityGroupsAsync(array $args = [])
 * @method \Aws\Result setSubnets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise setSubnetsAsync(array $args = [])
 */
class ElasticLoadBalancingV2Client extends AwsClient {

    public function __construct(array $args)
    {
        if (!isset($args['signing_name'])) {
            $args['signing_name'] = 'elasticloadbalancing';
        }
        if (!isset($args['endpoint'])) {
            $scheme = isset($args['scheme'])? $args['scheme'] : 'https';
            $args['endpoint'] =
                "{$scheme}://elasticloadbalancing.{$args['region']}.amazonaws.com";
        }

        parent::__construct($args);
    }
}
