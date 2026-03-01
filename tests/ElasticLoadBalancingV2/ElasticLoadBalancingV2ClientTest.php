<?php
namespace Aws\Test\ElasticLoadBalancingV2;

use Aws\ElasticLoadBalancingV2\ElasticLoadBalancingV2Client;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ElasticLoadBalancingV2Client::class)]
class ElasticLoadBalancingV2ClientTest extends TestCase
{
    use UsesServiceTrait;

    public function testSignningServiceNameIsElb()
    {
        $elbV2 = $this->getTestClient('ElasticLoadBalancingV2', [ 'region' => 'us-east-1' ]);
        $this->assertSame('elasticloadbalancing', $elbV2->getConfig('signing_name'));
    }

    public function testEndpointSetToElb()
    {
        $elbV2 = $this->getTestClient('ElasticLoadBalancingV2', [ 'region' => 'us-east-1' ]);
        $this->assertSame(
            'elasticloadbalancing.us-east-1.amazonaws.com',
            $elbV2->getEndpoint()->getHost()
        );
    }
}
