<?php
namespace Aws\Test\CloudSearchDomain;

use Aws\CloudSearchDomain\CloudSearchDomainClient;

/**
 * @covers Aws\CloudSearchDomain\CloudSearchDomainClient
 */
class CloudSearchDomainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testRequiresEndpoint()
    {
        new CloudSearchDomainClient([
            'service'   => 'cloudsearchdomain',
            'version'   => 'latest'
        ]);
    }

    public function testGetsRegionFromEndpoint()
    {
        $client = new CloudSearchDomainClient([
            'service'   => 'cloudsearchdomain',
            'endpoint'  => 'https://search-foo.us-west-2.cloudsearch.amazon.com',
            'signature' => 'v4',
            'version'   => 'latest'
        ]);
        $this->assertEquals('us-west-2', $client->getRegion());
    }
}
