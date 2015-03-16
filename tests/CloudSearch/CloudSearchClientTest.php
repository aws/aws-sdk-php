<?php
namespace Aws\Test\CloudSearchDomain;

use Aws\CloudSearch\CloudSearchClient;
use Aws\Result;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\CloudSearch\CloudSearchClient
 */
class CloudSearchClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCanCreateDomainClient()
    {
        $client = new CloudSearchClient([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);

        $this->addMockResults($client, [
            new Result([
                'DomainStatusList' => [
                    [
                        'SearchService' => [
                            'Endpoint' => 'foo.baz.com'
                        ]
                    ]
                ]
            ])
        ]);

        $dclient = $client->createDomainClient('foo', ['region' => 'us-west-1']);
        $this->assertEquals('https://foo.baz.com', (string) $dclient->getEndpoint());
        $this->assertEquals('us-west-1', $dclient->getRegion());
    }
}
