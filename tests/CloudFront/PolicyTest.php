<?php
namespace Aws\Test\CloudFront;

use Aws\CloudFront\Policy;

class PolicyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider cannedPolicyParameterProvider
     *
     * @param string $resource
     * @param int $ts
     */
    public function testCreatesCannedPolicies($resource, $ts)
    {
        $result = (string) new Policy($resource, $ts);
        $this->assertEquals(
            '{"Statement":[{"Resource":"' . $resource
            . '","Condition":{"DateLessThan":{"AWS:EpochTime":'
            . $ts . '}}}]}',
            $result
        );
    }

    public function cannedPolicyParameterProvider()
    {
        return [
            [
                'test.mp4',
                time() + 1000,
            ],
            [
                'videos/test.mp4',
                time() + 1000,
            ],
            [
                'https://aws.amazon.com/foo.bar?baz=quux',
                time() + 1000,
            ]
        ];
    }

    /**
     * @dataProvider policyProvider
     *
     * @param string $resource
     * @param string|int $until
     * @param string|int $from
     * @param string $ip
     * @param string $policy
     */
    public function testCreatesPolicies($resource, $until, $from, $ip, $policy)
    {
        $this->assertSame($policy, (string) new Policy($resource, $until, $from, $ip));
    }

    public function policyProvider()
    {
        return [
            [ // Canned policy
                'https://aws.amazon.com/foo.bar?baz=quux',
                1000,
                null,
                null,
                '{"Statement":[{"Resource":"https://aws.amazon.com/foo.bar?baz=quux","Condition":{"DateLessThan":{"AWS:EpochTime":1000}}}]}'
            ],
            [ // Custom start date
                'http?://www.foo.com/*',
                1000,
                0,
                null,
                '{"Statement":[{"Resource":"http?://www.foo.com/*","Condition":{"DateLessThan":{"AWS:EpochTime":1000},"DateGreaterThan":{"AWS:EpochTime":0}}}]}',
            ],
            [ // Custom IP range
                'https://*',
                1000,
                null,
                '127.0.0.1/32',
                '{"Statement":[{"Resource":"https://*","Condition":{"DateLessThan":{"AWS:EpochTime":1000},"IpAddress":{"AWS:SourceIp":"127.0.0.1/32"}}}]}',
            ],
            [ // Custom start date and IP range
                'https://*',
                1000,
                0,
                '127.0.0.1/32',
                '{"Statement":[{"Resource":"https://*","Condition":{"DateLessThan":{"AWS:EpochTime":1000},"DateGreaterThan":{"AWS:EpochTime":0},"IpAddress":{"AWS:SourceIp":"127.0.0.1/32"}}}]}',
            ],
        ];
    }
}
