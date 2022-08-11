<?php
namespace Aws\Test\Route53;

use Aws\Route53\Route53Client;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Route53\Route53Client
 */
class RouteClient53Test extends TestCase
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
        $requestUri = (string) $request->getUri();
        $this->assertStringContainsString('/hostedzone/foo/rrset/', $requestUri);
        $this->assertStringNotContainsString('/hostedzone/hostedzone', $requestUri);

        $command = $client->getCommand('GetReusableDelegationSet', [
            'Id' => '/delegationset/foo',
        ]);

        $request = \Aws\serialize($command);
        $requestUri = (string) $request->getUri();
        $this->assertStringContainsString('/delegationset/foo', $requestUri);
        $this->assertStringNotContainsString('/delegationset/delegationset', $requestUri);

        $command = $client->getCommand('CreateHostedZone', [
            'Name' => 'foo',
            'CallerReference' => '123',
            'DelegationSetId' => '/delegationset/bar',
        ]);

        $request = \Aws\serialize($command);
        $this->assertStringContainsString(
            '<DelegationSetId>bar</DelegationSetId>',
            $request->getBody()->getContents()
        );
    }
}
