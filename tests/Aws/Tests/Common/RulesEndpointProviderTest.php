<?php
namespace Aws\Tests\Common;

use Aws\Common\RulesEndpointProvider;

class RulesEndpointProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Requires a "service" value
     */
    public function testRequiresRegion()
    {
        $p = new RulesEndpointProvider(array());
        $p(array('region' => 'foo'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Requires a "region" value
     */
    public function testRequiresService()
    {
        $p = new RulesEndpointProvider(array());
        $p(array('service' => 'foo'));
    }

    public function endpointProvider()
    {
        return array(
            array('sa-east-1', 's3', 'http', 'http://s3-sa-east-1.amazonaws.com'),
            array('sa-east-1', 's3', 'https', 'https://s3-sa-east-1.amazonaws.com'),
            array('us-east-1', 's3', 'http', 'http://s3.amazonaws.com'),
            array('foo', 'sts', 'https', 'https://sts.amazonaws.com'),
            array('us-gov-west-1', 's3', 'https', 'https://s3-us-gov-west-1.amazonaws.com'),
            array('us-gov-west-1', 'iam', 'https', 'https://iam.us-gov.amazonaws.com'),
            array('cn-north-1', 's3', 'https', 'https://s3.cn-north-1.amazonaws.com.cn')
        );
    }

    /**
     * @dataProvider endpointProvider
     */
    public function testProvidesEndpoints($region, $service, $scheme, $url)
    {
        $p = RulesEndpointProvider::fromDefaults();
        $endpoint = call_user_func($p, array(
            'region'  => $region,
            'service' => $service,
            'scheme'  => $scheme
        ));
        $this->assertEquals($url, $endpoint['endpoint']);
    }
}
