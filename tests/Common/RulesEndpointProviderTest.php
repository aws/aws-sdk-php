<?php
namespace Aws\Test\Common;

use Aws\Common\RulesEndpointProvider;

/**
 * @covers Aws\Common\RulesEndpointProvider
 */
class RulesEndpointProviderTest extends \PHPUnit_Framework_TestCase
{
    public function invalidConfigProvider()
    {
        return [
            [[]],
            [['region' => 'foo']],
            [['service' => 'foo']],
        ];
    }

    /**
     * @dataProvider invalidConfigProvider
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsWhenConfigIsMissingData($input)
    {
        $e = new RulesEndpointProvider();
        $e->getEndpoint($input);
    }

    /**
     * @expectedException \Aws\Common\Exception\UnresolvedEndpointException
     * @expectedExceptionMessage Unable to resolve an endpoint for the "foo" service based on the provided configuration values: service=foo, region=bar, scheme=https
     */
    public function testThrowsWhenEndpointIsNotResolved()
    {
        $e = new RulesEndpointProvider(['foo' => ['rules' => []]]);
        $e->getEndpoint(['service' => 'foo', 'region' => 'bar']);
    }

    public function endpointProvider()
    {
        return [
            [
                ['region' => 'us-east-1', 'service' => 's3'],
                ['endpoint' => 'https://s3.amazonaws.com']
            ],
            [
                ['region' => 'us-east-1', 'service' => 's3', 'scheme' => 'http'],
                ['endpoint' => 'http://s3.amazonaws.com']
            ],
            [
                ['region' => 'us-east-1', 'service' => 'sdb'],
                ['endpoint' => 'https://sdb.amazonaws.com']
            ],
            [
                ['region' => 'us-west-2', 'service' => 's3'],
                ['endpoint' => 'https://s3-us-west-2.amazonaws.com']
            ],
            [
                ['region' => 'us-east-1', 'service' => 'iam'],
                ['endpoint' => 'https://iam.amazonaws.com']
            ],
            [
                ['region' => 'bar', 'service' => 'foo'],
                ['endpoint' => 'https://foo.bar.amazonaws.com']
            ],
            [
                ['region' => 'us-gov-baz', 'service' => 'iam'],
                ['endpoint' => 'https://iam.us-gov.amazonaws.com']
            ],
            [
                ['region' => 'us-gov-baz', 'service' => 's3'],
                ['endpoint' => 'https://s3.us-gov-baz.us-gov.amazonaws.com']
            ],
            [
                ['region' => 'cn-north-1', 'service' => 's3'],
                [
                    'endpoint' => 'https://s3.cn-north-1.amazonaws.com.cn',
                    'signatureVersion' => 'v4'
                ]
            ],
            [
                ['region' => 'cn-north-1', 'service' => 'ec2'],
                [
                    'endpoint' => 'https://ec2.cn-north-1.amazonaws.com.cn',
                    'signatureVersion' => 'v4'
                ]
            ]
        ];
    }

    /**
     * @dataProvider endpointProvider
     */
    public function testResolvesEndpoints($input, $output)
    {
        // Use the default endpoints file
        $p = new RulesEndpointProvider();
        $this->assertEquals($output, $p->getEndpoint($input));
    }

    public function testCanAddRegionsFromDirectory()
    {
        $tmp = sys_get_temp_dir() . '/endpoints';

        if (!is_dir($tmp)) {
            mkdir($tmp, 0777, true);
        }

        $f1 = $tmp . '/file-a.json';
        $f2 = $tmp . '/file-b.json';

        file_put_contents($f1, <<<EOT
[
  {
    "priority": 900,
    "regionPrefix": "foo-",
    "rules": [
      {
        "services": ["test"],
        "config": {
          "test": "123",
          "endpoint": "{scheme}://{service}.foo.com"
        }
      },
      {
        "config": {
          "endpoint": "{scheme}://foo.com"
        }
      }
    ]
  }
]
EOT
);

        file_put_contents($f2, <<<EOT
[
  {
    "priority": 100,
    "regionPrefix": "foo-",
    "rules": [
      {
        "services": ["qux"],
        "config": {
          "endpoint": "{scheme}://{service}.{region}.com"
        }
      }
    ]
  }
]
EOT
        );

        $e = new RulesEndpointProvider($tmp);

        $this->assertEquals(
            ['test' => '123', 'endpoint' => 'https://test.foo.com'],
            $e->getEndpoint(['service' => 'test', 'region' => 'foo-one'])
        );

        $this->assertEquals(
            ['endpoint' => 'https://qux.foo-one.com'],
            $e->getEndpoint(['service' => 'qux', 'region' => 'foo-one'])
        );

        $this->assertEquals(
            ['endpoint' => 'https://foo.com'],
            $e->getEndpoint(['service' => 'other', 'region' => 'foo-one'])
        );

        unlink($f1);
        unlink($f2);
        rmdir($tmp);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresFileIsReadable()
    {
        new RulesEndpointProvider('/path/to/file/that/does/not/exist');
    }
}
