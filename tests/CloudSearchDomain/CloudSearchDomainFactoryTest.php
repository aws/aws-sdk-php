<?php
namespace Aws\Test\CloudSearchDomain;

use Aws\CloudSearchDomain\CloudSearchDomainFactory;

/**
 * @covers Aws\CloudSearchDomain\CloudSearchDomainFactory
 */
class CloudSearchDomainFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testRequiresEndpoint()
    {
        (new CloudSearchDomainFactory)->create();
    }

    public function testDisablesRedirects()
    {
        $client = (new CloudSearchDomainFactory)->create([
            'service'   => 'cloudsearchdomain',
            'endpoint'  => 'search-foo.us-west-2.cloudsearch.amazon.com',
            'signature' => 'v4',
        ]);
        $this->assertEquals('us-west-2', $client->getRegion());
    }
}
