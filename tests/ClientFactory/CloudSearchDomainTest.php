<?php
namespace Aws\Test\ClientFactory;

use Aws\ClientFactory\CloudSearchDomain;

/**
 * @covers Aws\ClientFactory\CloudSearchDomain
 */
class CloudSearchDomainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testRequiresEndpoint()
    {
        (new CloudSearchDomain)->create();
    }

    public function testGetsRegionFromEndpoint()
    {
        $client = (new CloudSearchDomain)->create([
            'service'   => 'cloudsearchdomain',
            'endpoint'  => 'search-foo.us-west-2.cloudsearch.amazon.com',
            'signature' => 'v4',
            'version'   => 'latest'
        ]);
        $this->assertEquals('us-west-2', $client->getRegion());
    }
}
