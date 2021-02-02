<?php
namespace Aws\Test\S3Control;

use Aws\Arn\ArnParser;
use Aws\Exception\UnresolvedEndpointException;
use Aws\S3Control\S3ControlClient;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3Control\S3ControlClient
 */
class S3ControlClientTest extends TestCase
{
    use S3ControlTestingTrait;

    public function testAppliesS3ControlEndpointMiddleware()
    {
        // test applies the hostprefix trait for account id
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                '111222333444.s3-control.us-west-2.amazonaws.com',
                $req->getUri()->getHost()
            );
            return Promise\promise_for(new Response);
        };

        $client = $this->getTestClient([
            'http_handler' => $handler,
        ]);
        $client->deletePublicAccessBlock([
            'AccountId' => '111222333444',
        ]);
    }

    public function testAppliesS3ControlEndpointMiddlewareDualstack()
    {
        // test applies dualstack
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                '111222333444.s3-control.dualstack.us-west-2.amazonaws.com',
                $req->getUri()->getHost()
            );
            return Promise\promise_for(new Response);
        };

        $dualStackClient = $this->getTestClient([
            'http_handler' => $handler,
            'use_dual_stack_endpoint' => true,
        ]);
        $dualStackClient->deletePublicAccessBlock([
            'AccountId' => '111222333444',
        ]);

        $client = $this->getTestClient([
            'http_handler' => $handler,
        ]);
        $client->deletePublicAccessBlock([
            'AccountId' => '111222333444',
            '@use_dual_stack_endpoint' => true,
        ]);
    }

    public function privateLinkSuccessProvider() {
        return [
            ['getAccessPoint', ['Name' => 'apname', 'AccountId'=> '123456789012'] , 'beta.example.com', ['s3'=> ['use_dual_stack_endpoint'=> false, 'addressing_style'=> 'virtual', 'use_arn_region'=> false]] , 'us-west-2' , '123456789012.beta.example.com' , ['name'=> 's3', 'region'=> 'us-west-2']] ,
            ['getAccessPoint', ['Name' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint', 'AccountId'=> '123456789012'] , 'beta.example.com', ['s3'=> ['use_dual_stack_endpoint'=> false, 'addressing_style'=> 'virtual', 'use_arn_region'=> false]] , 'us-west-2' , 'beta.example.com' , ['name'=> 's3-outposts', 'region'=> 'us-west-2'] ],
            ['createBucket', ['Bucket'=> 'bucketname', 'OutpostId'=> 'op-123'] , 'beta.example.com', ['s3'=> ['use_dual_stack_endpoint'=> false, 'addressing_style'=> 'virtual', 'use_arn_region'=> false]] , 'us-west-2' , 'beta.example.com' , ['name'=> 's3-outposts', 'region'=> 'us-west-2']] ,
            ['getBucket', ['Bucket'=> 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:bucket:mybucket', 'AccountId'=> '123456789012'] , 'beta.example.com', ['s3'=> ['use_dual_stack_endpoint'=> false, 'addressing_style'=> 'virtual', 'use_arn_region'=> false]] , 'us-west-2' , 'beta.example.com' , ['name'=> 's3-outposts', 'region'=> 'us-west-2']] ,
        ];
    }
    /**
     * @dataProvider privateLinkSuccessProvider
     * @param $operation
     * @param $parameters
     * @param $endpoint_url
     * @param $configuration
     * @param $region
     * @param $expectedEndpoint
     * @param $expectedSignature
     */
    public function testListObjectsWithPrivateLinkSuccess(
        $operation,
        $parameters,
        $endpoint_url,
        $configuration,
        $region,
        $expectedEndpoint,
        $expectedSignature
    )
    {
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                '111222333444.s3-control.dualstack.us-west-2.amazonaws.com',
                $req->getUri()->getHost()
            );
            return Promise\promise_for(new Response);
        };
        $s3ControlClientConfig = [
            'version' => '2018-08-20',
            'region'      => $region,
            'endpoint' => $endpoint_url,
            'http_handler' => $handler,
        ];
        if (!empty($configuration['s3']['use_dual_stack_endpoint'])) {
            $s3ControlClientConfig['use_dual_stack_endpoint'] = $configuration['s3']['use_dual_stack_endpoint'];
        }
        if (!empty($configuration['s3']['addressing_style'])) {
            $s3ControlClientConfig['addressing_style'] = $configuration['s3']['addressing_style'];
        }
        if (!empty($configuration['s3']['use_arn_region'])) {
            $s3ControlClientConfig['use_arn_region'] = $configuration['s3']['use_arn_region'];
        }
        if (!empty($configuration['s3']['use_path_style_endpoint'])) {
            $s3ControlClientConfig['use_path_style_endpoint'] = $configuration['s3']['use_path_style_endpoint'];
        }

        $client = new S3ControlClient($s3ControlClientConfig);
        $command = $client->getCommand($operation, $parameters);
        $request = \Aws\serialize($command);

        $signer = new SignatureV4(
            's3-outposts',
            $region
        );
        $requestUri = $signer->presign($request, $client->getCredentials()->wait(), time())->getUri();

        self::assertSame($expectedEndpoint, $requestUri->getHost());

        foreach ($expectedSignature as $expectedInSignature) {
            self::assertContains($expectedInSignature, $requestUri->getQuery());
        }
    }
    public function privateLinkFailureProvider() {
        return [
            ['getAccessPoint' , ['Name'=> 'apname', 'AccountId'=> '123456789012'] , 'beta.example.com' , ['s3'=> ['use_dual_stack_endpoint'=> true, 'addressing_style'=> 'virtual', 'use_arn_region'=> false]] , 'us-west-2' , 'Dualstack + Custom endpoint is not supported'] ,
            ['getAccessPoint' , ['Name'=> 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint', 'AccountId'=> '123456789012'] , 'beta.example.com' , ['s3'=> ['use_dual_stack_endpoint'=> true, 'addressing_style'=> 'virtual', 'use_arn_region'=> false]] , 'us-west-2' , 'Dualstack is currently not supported with S3 Outposts ARNs.'] ,
            ['createBucket' , ['Bucket'=> 'bucketname', 'OutpostId'=> 'op-123'] , 'beta.example.com' , ['s3'=> ['use_dual_stack_endpoint'=> true, 'addressing_style'=> 'virtual', 'use_arn_region'=> false]] , 'us-west-2' , 'Dualstack is currently not supported with S3 Outposts ARNs.'] ,
            ['getBucket' , ['Bucket'=> 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:bucket:mybucket', 'AccountId'=> '123456789012'] , 'beta.example.com' , ['s3'=> ['use_dual_stack_endpoint'=> true, 'addressing_style'=> 'virtual', 'use_arn_region'=> false]] , 'us-west-2' , 'Dualstack is currently not supported with S3 Outposts ARNs.'] ,
        ];
    }

    /**
     * @dataProvider privateLinkFailureProvider
     * @param $operation
     * @param $parameters
     * @param $endpoint_url
     * @param $configuration
     * @param $region
     * @param $expectedException
     */
    public function testListObjectsWithPrivateLinkFailures(
        $operation,
        $parameters,
        $endpoint_url,
        $configuration,
        $region,
        $expectedException
    )
    {
        if (version_compare(PHP_VERSION, '7.1', '<')) {
            $this->markTestSkipped();
        }
        if (method_exists($this, 'expectException')) {
            $this->expectException(\Aws\Exception\UnresolvedEndpointException::class);
            $this->expectExceptionMessage($expectedException);
        } else {
            $this->setExpectedException(\Aws\Exception\UnresolvedEndpointException::class, $expectedException);
        }
        $handler = function (RequestInterface $req) {
            return Promise\promise_for(new Response);
        };
        $s3ControlClientConfig = [
            'version' => '2018-08-20',
            'region'      => $region,
            'endpoint' => $endpoint_url,
            'http_handler' => $handler,
        ];
        if (!empty($configuration['s3']['use_dual_stack_endpoint'])) {
            $s3ControlClientConfig['use_dual_stack_endpoint'] = $configuration['s3']['use_dual_stack_endpoint'];
        }
        if (!empty($configuration['s3']['addressing_style'])) {
            $s3ControlClientConfig['addressing_style'] = $configuration['s3']['addressing_style'];
        }
        if (!empty($configuration['s3']['use_arn_region'])) {
            $s3ControlClientConfig['use_arn_region'] = $configuration['s3']['use_arn_region'];
        }
        if (!empty($configuration['s3']['use_path_style_endpoint'])) {
            $s3ControlClientConfig['use_path_style_endpoint'] = $configuration['s3']['use_path_style_endpoint'];
        }

        $client = new S3ControlClient($s3ControlClientConfig);
        $command = $client->getCommand($operation, $parameters);
        $request = \Aws\serialize($command);

        $signer = new SignatureV4(
            's3-outposts',
            $region
        );
        $requestUri = $signer->presign($request, $client->getCredentials()->wait(), time())->getUri();
        $s3ControlClient = new S3ControlClient($s3ControlClientConfig);
        $command = $s3ControlClient->getCommand($operation, $parameters);
        \Aws\serialize($command);
    }
}
