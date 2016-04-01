<?php
namespace Aws\Test;

use Aws\Endpoint\EndpointProvider;
use Aws\Endpoint\PatternEndpointProvider;

/**
 * @covers Aws\Endpoint\PatternEndpointProvider
 */
class PatternEndpointProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsNullWhenUnresolved()
    {
        $e = new PatternEndpointProvider(['foo' => ['rules' => []]]);
        $this->assertNull($e(['service' => 'foo', 'region' => 'bar']));
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
                ['region' => 'us-gov-west-1', 'service' => 'iam'],
                ['endpoint' => 'https://iam.us-gov.amazonaws.com']
            ],
            [
                ['region' => 'us-gov-west-1', 'service' => 's3'],
                ['endpoint' => 'https://s3-us-gov-west-1.amazonaws.com']
            ],
            [
                ['region' => 'us-gov-baz', 'service' => 'foo'],
                ['endpoint' => 'https://foo.us-gov-baz.amazonaws.com']
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
        $p = EndpointProvider::patterns([
            '*/*' => ['endpoint' => '{service}.{region}.amazonaws.com'],
            'cn-north-1/*' => [
                'endpoint' => '{service}.{region}.amazonaws.com.cn',
                'signatureVersion' => 'v4',
            ],
            'us-gov-west-1/iam' => ['endpoint' => 'iam.us-gov.amazonaws.com'],
            'us-gov-west-1/s3' => ['endpoint' => 's3-{region}.amazonaws.com'],
            '*/cloudfront' => ['endpoint' => 'cloudfront.amazonaws.com'],
            '*/iam' => ['endpoint' => 'iam.amazonaws.com'],
            'us-gov-west-1/sts' => ['endpoint' => 'sts.us-gov-west-1.amazonaws.com'],
            '*/importexport' => ['endpoint' => 'importexport.amazonaws.com'],
            '*/route53' => ['endpoint' => 'route53.amazonaws.com'],
            '*/sts' => ['endpoint' => 'sts.amazonaws.com'],
            '*/waf' => ['endpoint' => 'waf.amazonaws.com'],
            'us-east-1/sdb' => ['endpoint' => 'sdb.amazonaws.com'],
            'us-east-1/s3' => ['endpoint' => 's3.amazonaws.com'],
            'us-west-1/s3' => ['endpoint' => 's3-{region}.amazonaws.com'],
            'us-west-2/s3' => ['endpoint' => 's3-{region}.amazonaws.com'],
            'eu-west-1/s3' => ['endpoint' => 's3-{region}.amazonaws.com'],
            'ap-southeast-1/s3' => ['endpoint' => 's3-{region}.amazonaws.com'],
            'ap-southeast-2/s3' => ['endpoint' => 's3-{region}.amazonaws.com'],
            'ap-northeast-1/s3' => ['endpoint' => 's3-{region}.amazonaws.com'], 
            'sa-east-1/s3' => ['endpoint' => 's3-{region}.amazonaws.com'],
        ]);
        
        $this->assertEquals($output, call_user_func($p, $input));
    }
}
