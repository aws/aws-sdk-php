<?php

namespace Aws\Tests\CloudFront\Waiter;

use Guzzle\Http\Message\Response;

/**
 * @covers Aws\CloudFront\Waiter\DistributionDeployed
 */
class DistributionDeployedTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testReturnsTrueIfDeployed()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $this->setMockResponse($client, array(
            'cloudfront/GetDistribution_InProgress',
            'cloudfront/GetDistribution_Deployed'
        ));
        $client->waitUntil('distribution_deployed', 'foo', array(
            'interval' => 0
        ));
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage Maximum number of failures while waiting: 1
     */
    public function testDoesNotBufferOtherExceptions()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $this->setMockResponse($client, array(new Response(404)));
        $client->waitUntil('distribution_deployed', 'foo');
    }
}
