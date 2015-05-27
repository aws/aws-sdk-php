<?php
namespace Aws\Test\Route53;

use Aws\Route53\Route53Client;

/**
 * @covers Aws\Route53\Route53Client
 */
class Route53ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testCleansIds()
    {
        $client = new Route53Client([
            'service' => 'route53',
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $command = $client->getCommand('ChangeResourceRecordSets', [
            'HostedZoneId' => '/hostedzone/foo',
            'ChangeBatch'  => [
                'Changes' => [
                    'bar' => [
                        'Action' => 'foo',
                        'ResourceRecordSet' => [
                            'Name' => 'baz',
                            'Type' => 'abc'
                        ]
                    ]
                ]
            ]
        ]);

        $request = \Aws\serialize($command);

        $this->assertContains(
            '/hostedzone/foo/rrset/',
            (string) $request->getUri()
        );
    }
}
