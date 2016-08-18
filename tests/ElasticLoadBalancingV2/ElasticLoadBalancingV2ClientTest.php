<?php
namespace Aws\Test\ElasticLoadBalancingV2;

use Aws\ElasticLoadBalancingV2\ElasticLoadBalancingV2Client;
use Aws\MockHandler;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response;

/**
 * @covers Aws\ElasticLoadBalancingV2\ElasticLoadBalancingV2Client
 */
class ElasticLoadBalancingV2ClientTest extends \PHPUnit_Framework_TestCase
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
